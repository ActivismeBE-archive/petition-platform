-- SoftDelete bug patch
ALTER TABLE activisme_dev.abilities         CHANGE `deleted_at` `deleted_at` TIMESTAMP  NULL DEFAULT NULL;
ALTER TABLE activisme_dev.auth_reset        CHANGE `deleted_at` `deleted_at` TIMESTAMP  NULL DEFAULT NULL;
ALTER TABLE activisme_dev.authencation_bans CHANGE `deleted_at` `deleted_at` TIMESTAMP  NULL DEFAULT NULL;
ALTER TABLE activisme_dev.categories        CHANGE `deleted_at` `deleted_at` TIMESTAMP  NULL DEFAULT NULL;
ALTER TABLE activisme_dev.cities            CHANGE `deleted_at` `deleted_at` TIMESTAMP  NULL DEFAULT NULL;
ALTER TABLE activisme_dev.comments          CHANGE `deleted_at` `deleted_at` TIMESTAMP  NULL DEFAULT NULL;
ALTER TABLE activisme_dev.continents        CHANGE `deleted_at` `deleted_at` TIMESTAMP  NULL DEFAULT NULL;
ALTER TABLE activisme_dev.countries         CHANGE `deleted_at` `deleted_at` TIMESTAMP  NULL DEFAULT NULL;
ALTER TABLE activisme_dev.currencies        CHANGE `deleted_at` `deleted_at` TIMESTAMP  NULL DEFAULT NULL;
ALTER TABLE activisme_dev.links             CHANGE `deleted_at` `deleted_at` TIMESTAMP  NULL DEFAULT NULL;
ALTER TABLE activisme_dev.permissions       CHANGE `deleted_at` `deleted_at` TIMESTAMP  NULL DEFAULT NULL;
ALTER TABLE activisme_dev.abilities         CHANGE `deleted_at` `deleted_at` TIMESTAMP  NULL DEFAULT NULL;
ALTER TABLE activisme_dev.petition_update   CHANGE `deleted_at` `deleted_at` TIMESTAMP  NULL DEFAULT NULL;
ALTER TABLE activisme_dev.petitions         CHANGE `deleted_at` `deleted_at` TIMESTAMP  NULL DEFAULT NULL;
ALTER TABLE activisme_dev.provinces         CHANGE `deleted_at` `deleted_at` TIMESTAMP  NULL DEFAULT NULL;
ALTER TABLE activisme_dev.abilities         CHANGE `deleted_at` `deleted_at` TIMESTAMP  NULL DEFAULT NULL;
ALTER TABLE activisme_dev.questions         CHANGE `deleted_at` `deleted_at` TIMESTAMP  NULL DEFAULT NULL;
ALTER TABLE activisme_dev.report_reasons    CHANGE `deleted_at` `deleted_at` TIMESTAMP  NULL DEFAULT NULL;
ALTER TABLE activisme_dev.signatures        CHANGE `deleted_at` `deleted_at` TIMESTAMP  NULL DEFAULT NULL;
ALTER TABLE activisme_dev.types             CHANGE `deleted_at` `deleted_at` TIMESTAMP  NULL DEFAULT NULL;
ALTER TABLE activisme_dev.users             CHANGE `deleted_at` `deleted_at` TIMESTAMP  NULL DEFAULT NULL;
ALTER TABLE activisme_dev.volunteer_groups  CHANGE `deleted_at` `deleted_at` TIMESTAMP  NULL DEFAULT NULL;
ALTER TABLE activisme_dev.vrijwilligers     CHANGE `deleted_at` `deleted_at` TIMESTAMP  NULL DEFAULT NULL;

-- Implement missing database columns on the users table.
ALTER TABLE activisme_dev.users ADD birth_date VARCHAR(255) NULL;
ALTER TABLE activisme_dev.users ADD address    VARCHAR(255) NULL;
ALTER TABLE activisme_dev.users ADD city       INT(5)       NULL;
ALTER TABLE activisme_dev.users ADD country    INT(5)       NULL;
