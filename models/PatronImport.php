<?php namespace HendrikErz\PatreonList\Models;

use HendrikErz\PatreonList\Models\Patron;
use HendrikErz\PatreonList\Models\Tier;
use Carbon\Carbon;

class PatronImport extends \Backend\Models\ImportModel
{
    /**
     * @var array The rules to be applied to the data.
     */
    public $rules = [];

    // More info: https://wintercms.com/docs/backend/import-export
    public function importData($results, $sessionKey = null)
    {
        $seen = []; // Remember what patrons we had to warn on duplicates

        foreach ($results as $row => $data) {
            // Warn if there is no Email, as this is
            // being used as sort of an identifier internally
            if (!isset($data['patreon_id'])) {
                $this->logWarning($row, "The Patron " . $data['name'] . " has no Patreon ID!");
            } else {
                // Warn of possible duplicates
                if (in_array($data['patreon_id'], $seen)) {
                    $this->logWarning($row, 'The Patron ' . $data['name'] . ' (' . $data['patreon_id'] . ') has already been imported! Possible Duplicate.');
                } else {
                    $seen[] = $data['patreon_id'];
                }
            }

            $tier = null;

            // Determine the tier, if applicable
            if ($data['tier'] !== '') {
                try {
                    $tier = Tier::where('name', $data['tier'])->firstOrFail();
                } catch (\Exception $e) {
                    // Create a tier and assume the pledge amount from
                    // the patron, as this will in most cases not deviate.
                    $this->logWarning($row, 'Tier ' . $data['tier'] . ' does not exist! Creating ...');
                    $tier = new Tier;
                    $tier->name = $data['tier'];
                    if (isset($data['current_pledge']) && $data['current_pledge'] !== '') {
                        $tier->pledge_amount = floatval($data['current_pledge']);
                        $tier->currency = $data['currency'];
                    } else {
                        $tier->pledge_amount = 0.0;
                    }
                    $tier->save();
                }
            }

            // Due to the nature of CSVs, even boolean fields are quite
            // literal. So we need to change that here!
            if (isset($data['follows_you'])) {
                $data['follows_you'] = $data['follows_you'] === 'Yes' ? 1 : 0;
            }

            // Same: We want a nice boolean here.
            if (isset($data['patron_status'])) {
                $data['patron_status'] = strtolower($data['patron_status']) === 'active patron' ? 1 : 0;
            }

            // During payment processing, some patrons will already be included
            // despite having not yet a last charge status. If so, use the
            // current date and warn about that fact, so the creator knows that
            // they should re-try it afterwards. These errors will be thrown on
            // MySQL-based databases, but, for instance, not on SQLite databases.
            if ($data['last_charge'] === '') {
              $this->logWarning($row, "Patron " . $data['name'] . " (" . $data['email'] . ") does not have a charge date. Assuming today.");
              $data['last_charge'] = Carbon::now();
            }

            if ($data['patron_since'] === '') {
                $this->logWarning($row, $data['name'] . " (" . $data['email'] . ") does not seem to be a patron. Skipping.");
                continue;
            }

            // Now, let's see if we already have this patron somewhere
            try {
                $patron = Patron::where('patreon_id', $data['patreon_id'])->firstOrFail();
                $patron->fill($data);
                if ($tier) {
                    // Attach to its tier
                    $tier->patrons()->add($patron);
                } else {
                    $patron->save(); // Save without tier
                }

                $this->logUpdated();
                // Continue with next loop iteration
                continue;
            } catch (\Exception $ex) {
                // At this point, do not log an error,
                // because the error is to be expected.
            }

            // Try creating the patron
            try {
                $patron = new Patron;
                $patron->fill($data);
                if ($tier) {
                    // Attach to its tier
                    $tier->patrons()->add($patron);
                } else {
                    $patron->save(); // Save without tier
                }

                $this->logCreated();
            } catch (\Exception $ex) {
                $this->logError($row, $ex->getMessage());
            }
        }
    }
}
