<?php return [
    'plugin' => [
        'name' => 'Patreon List',
        'description' => 'Mit diesem Plugin können Patrons auf Patreon verwaltet werden und als Liste auf der Webseite dargestellt werden.',
        'import_csv' => 'Patrons importieren',
        'list_patrons' => 'Patrons',
    ],
    'patrons' => [
        'title' => 'Patrons',
        'start_import' => 'Liste importieren',
        'create_patron' => 'Neuer Patron',
        'update_patron' => 'Patron bearbeiten',
        'unlink_tiers' => 'Patrons von ihren Tiers entfernen',
        'unlink_tiers_confirm' => 'Wirklich die Tiers von den ausgewählten Patrons entfernen?',
        'form_tab_personal_title' => 'Persönliche Info',
        'form_tab_status_title' => 'Patreon-Status',
        'form_input_tier_label' => 'Tier',
        'form_input_tier_comment' => 'Wähle den Tier des Patrons aus',
        'form_input_pledge_label' => 'Aktuelle Zahlung',
        'form_input_pledge_comment' => 'Wieviel dieser Patron derzeit zahlt',
        'form_input_lifetime_label' => 'Insgesamte Zahlungen',
        'form_input_lifetime_comment' => 'Wieviel dieser Patron insgesamt gezahlt hat',
        'form_input_max_label' => 'Maximale Menge',
        'form_input_max_comment' => 'Die größte Zahlung',
        'form_input_lastcharge_label' => 'Letzte Zahlung',
        'form_input_lastcharge_comment' => 'Wann wurde zuletzt Geld eingezogen?',
        'form_input_name_label' => 'Name',
        'form_input_name_comment' => 'Der Name des Patrons',
        'form_input_email_label' => 'Email',
        'form_input_email_comment' => 'Die Email des Patrons',
        'form_input_twitter_label' => 'Twitter',
        'form_input_twitter_comment' => 'Das Twitterhandle des Patrons',
        'form_input_since_label' => 'Patron seit',
        'form_input_since_comment' => 'Seit wann ist diese Person Patron?',
        'form_input_charge_status_label' => 'Zahlungsstatus',
        'form_input_charge_status_comment' => 'Der Status der letzten Zahlung',
        'form_input_follower_label' => 'Folgt dir',
        'form_input_follower_comment' => 'Folgt dir dieser Patron?',
        'form_input_hide_label' => 'Patron verstecken',
        'form_input_hide_comment' => 'Wenn aktiv wird dieser Patron nirgends ausgegeben, unabhängig von den Einstellungen. Hilfreich, um Patrons zu anonymisieren.',
        'form_input_extra1_label' => 'Extra-Text (1)',
        'form_input_extra1_comment' => 'In diesem Feld können arbiträre Informationen gespeichert werden.',
        'form_input_extra2_label' => 'Extra-Text (2)',
        'form_input_extra2_comment' => 'In diesem Feld können arbiträre Informationen gespeichert werden.',
        'form_input_patreon_id_label' => 'Patreon Benutzer-ID',
        'form_input_patreon_id_comment' => 'Die Benutzer-ID des Patrons auf Patreon'
    ],
    'tiers' => [
      'tiers_title' => 'Tiers',
      'create_form_title' => 'Neuen Tier erstellen',
      'update_form_title' => 'Tier verwalten',
      'reorder_form_title' => 'Tiers sortieren',
      'form_input_name_label' => 'Name des Tiers',
      'form_input_name_comment' => 'Wie heißt dieser Tier?',
      'form_input_pledge_amount_label' => 'Zahlung',
      'form_input_pledge_amount_comment' => 'Welche Summe ist an diesen Tier gebunden?',
      'form_input_description_label' => 'Beschreibung',
      'form_input_description_comment' => 'Eine Beschreibung für diesen Tier. Kann auf der Seite dargestellt werden.',
    ],
    'components' => [
      'patrons' => [
        'name' => 'Liste von Patrons',
        'description' => 'Stellt eine schlichte Liste aller Patrons dar',
        'exclude_title' => 'Nur aktive Patrons',
        'exclude_description' => 'Wenn aktiv, werden nur aktive Patrons mit einer Summe über 0 Dollar angezeigt',
        'sort_title' => 'Sortieren',
        'sort_description' => 'Optionen zum Sortieren der Patrons',
        'sort_by_title' => 'Sortierrichtung',
        'sort_by_description' => 'Aufsteigend oder absteigend sortieren',
        'sort_asc' => 'Aufsteigend',
        'sort_desc' => 'Absteigend',
        'sort_id' => 'ID',
        'sort_name' => 'Name',
        'sort_pledge' => 'Aktuelle Summe',
        'sort_lifetime' => 'Gesamtsumme',
        'sort_age' => 'Patron-Alter'
      ],
      'tiers' => [
        'name' => 'Tier-Liste',
        'description' => 'Stellt eine Liste aller Tiers dar',
        'exclude_title' => 'Leere Tiers ausblenden',
        'exclude_description' => 'Wenn aktiv werden Tiers ohne Patrons ausgeblendet'
      ]
    ],
    'filter' => [
      'patron_status_active' => 'Aktiv',
      'patron_status_inactive' => 'Inaktiv',
      'tiers' => 'Tiers',
      'pledge' => 'Summe',
      'patron_status_hidden' => 'Ausgeblendet'
    ],
    'columns' => [
      'id_label' => 'ID',
      'patreon_id_label' => 'Patreon-ID',
      'created_on_label' => 'Erstellt am',
      'updated_on_label' => 'Aktualisiert am',
      'removed_on_label' => 'Gelöscht am',
      'name_label' => 'Name',
      'email_label' => 'Email',
      'twitter_label' => 'Twitter',
      'status_label' => 'Patron-Status',
      'status_active' => 'Aktiv',
      'status_inactive' => 'Inaktiv',
      'follows_label' => 'Folgt dir',
      'pledge_label' => 'Aktuelle Summe (Dollar)',
      'lifetime_label' => 'Gesamtsumme (Dollar)',
      'tier_label' => 'Tier',
      'patronage_label' => 'Patron seit',
      'max_label' => 'Maximale Summe',
      'last_charge_label' => 'Letztes Zahlungsdatum',
      'charge_status_label' => 'Letzter Zahlungsstatus',
      'sort_label' => 'Sortierreihenfolge',
      'description_label' => 'Beschreibung',
      'pledge_amount_label' => 'Summe (Dollar)',
      'patron_count_label' => 'Patrons auf diesem Tier',
      'hide_from_all' => 'Anzeigestatus',
      'hide_from_all_tooltip' => 'Dieser Patron ist versteckt',
      'extra1_label' => 'Extra (1)',
      'extra2_label' => 'Extra (2)'
    ]
];
