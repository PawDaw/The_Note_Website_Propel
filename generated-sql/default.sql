
BEGIN;

-----------------------------------------------------------------------
-- note
-----------------------------------------------------------------------

DROP TABLE IF EXISTS "note" CASCADE;

CREATE TABLE "note"
(
    "id" serial NOT NULL,
    "note" VARCHAR(255) NOT NULL,
    PRIMARY KEY ("id")
);

-----------------------------------------------------------------------
-- person
-----------------------------------------------------------------------

DROP TABLE IF EXISTS "person" CASCADE;

CREATE TABLE "person"
(
    "id" serial NOT NULL,
    "name" VARCHAR(255) NOT NULL,
    "pass" VARCHAR(255) NOT NULL,
    PRIMARY KEY ("id")
);

-----------------------------------------------------------------------
-- person_note
-----------------------------------------------------------------------

DROP TABLE IF EXISTS "person_note" CASCADE;

CREATE TABLE "person_note"
(
    "id" serial NOT NULL,
    "person_id" INTEGER NOT NULL,
    "note_id" INTEGER NOT NULL,
    PRIMARY KEY ("id")
);

ALTER TABLE "person_note" ADD CONSTRAINT "fk__note"
    FOREIGN KEY ("person_id")
    REFERENCES "person" ("id");

ALTER TABLE "person_note" ADD CONSTRAINT "fk__user"
    FOREIGN KEY ("note_id")
    REFERENCES "note" ("id");

COMMIT;
