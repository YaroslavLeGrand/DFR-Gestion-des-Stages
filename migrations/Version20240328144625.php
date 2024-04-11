<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240328144625 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE accueillir (id INT AUTO_INCREMENT NOT NULL, annee DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE accueillir_etudiant (accueillir_id INT NOT NULL, etudiant_id INT NOT NULL, INDEX IDX_64DAE3A47CEFB286 (accueillir_id), INDEX IDX_64DAE3A4DDEAB1A3 (etudiant_id), PRIMARY KEY(accueillir_id, etudiant_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE accueillir_specialitee (accueillir_id INT NOT NULL, specialitee_id INT NOT NULL, INDEX IDX_75D1442E7CEFB286 (accueillir_id), INDEX IDX_75D1442E2F9FD29A (specialitee_id), PRIMARY KEY(accueillir_id, specialitee_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE accueillir_classe (accueillir_id INT NOT NULL, classe_id INT NOT NULL, INDEX IDX_D2F55F9B7CEFB286 (accueillir_id), INDEX IDX_D2F55F9B8F5EA509 (classe_id), PRIMARY KEY(accueillir_id, classe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE accueillir_entreprise (accueillir_id INT NOT NULL, entreprise_id INT NOT NULL, INDEX IDX_5E42C4207CEFB286 (accueillir_id), INDEX IDX_5E42C420A4AEAFEA (entreprise_id), PRIMARY KEY(accueillir_id, entreprise_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE accuiellir (id_classe_id INT NOT NULL, id_specialitee_id INT NOT NULL, id_etudiant_id INT NOT NULL, id_entreprise_id INT NOT NULL, annee DATETIME NOT NULL, INDEX IDX_1C55FE23F6B192E (id_classe_id), INDEX IDX_1C55FE2312F96F9C (id_specialitee_id), INDEX IDX_1C55FE23C5F87C54 (id_etudiant_id), INDEX IDX_1C55FE231A867E8F (id_entreprise_id), PRIMARY KEY(id_classe_id, id_specialitee_id, id_etudiant_id, id_entreprise_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prefere (id INT AUTO_INCREMENT NOT NULL, id_specialisation_id INT DEFAULT NULL, id_classe_id INT DEFAULT NULL, INDEX IDX_16BC7415A710BC5B (id_specialisation_id), INDEX IDX_16BC7415F6B192E (id_classe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prefere_entreprise (prefere_id INT NOT NULL, entreprise_id INT NOT NULL, INDEX IDX_5AD54C56F528E7E8 (prefere_id), INDEX IDX_5AD54C56A4AEAFEA (entreprise_id), PRIMARY KEY(prefere_id, entreprise_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE preferer (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE preferer_specialitee (preferer_id INT NOT NULL, specialitee_id INT NOT NULL, INDEX IDX_2AF17F5F1E998ED (preferer_id), INDEX IDX_2AF17F52F9FD29A (specialitee_id), PRIMARY KEY(preferer_id, specialitee_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE preferer_classe (preferer_id INT NOT NULL, classe_id INT NOT NULL, INDEX IDX_CE5BB4B4F1E998ED (preferer_id), INDEX IDX_CE5BB4B48F5EA509 (classe_id), PRIMARY KEY(preferer_id, classe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE preferer_entreprise (preferer_id INT NOT NULL, entreprise_id INT NOT NULL, INDEX IDX_27218921F1E998ED (preferer_id), INDEX IDX_27218921A4AEAFEA (entreprise_id), PRIMARY KEY(preferer_id, entreprise_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE accueillir_etudiant ADD CONSTRAINT FK_64DAE3A47CEFB286 FOREIGN KEY (accueillir_id) REFERENCES accueillir (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE accueillir_etudiant ADD CONSTRAINT FK_64DAE3A4DDEAB1A3 FOREIGN KEY (etudiant_id) REFERENCES etudiant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE accueillir_specialitee ADD CONSTRAINT FK_75D1442E7CEFB286 FOREIGN KEY (accueillir_id) REFERENCES accueillir (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE accueillir_specialitee ADD CONSTRAINT FK_75D1442E2F9FD29A FOREIGN KEY (specialitee_id) REFERENCES specialitee (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE accueillir_classe ADD CONSTRAINT FK_D2F55F9B7CEFB286 FOREIGN KEY (accueillir_id) REFERENCES accueillir (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE accueillir_classe ADD CONSTRAINT FK_D2F55F9B8F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE accueillir_entreprise ADD CONSTRAINT FK_5E42C4207CEFB286 FOREIGN KEY (accueillir_id) REFERENCES accueillir (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE accueillir_entreprise ADD CONSTRAINT FK_5E42C420A4AEAFEA FOREIGN KEY (entreprise_id) REFERENCES entreprise (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE accuiellir ADD CONSTRAINT FK_1C55FE23F6B192E FOREIGN KEY (id_classe_id) REFERENCES classe (id)');
        $this->addSql('ALTER TABLE accuiellir ADD CONSTRAINT FK_1C55FE2312F96F9C FOREIGN KEY (id_specialitee_id) REFERENCES specialitee (id)');
        $this->addSql('ALTER TABLE accuiellir ADD CONSTRAINT FK_1C55FE23C5F87C54 FOREIGN KEY (id_etudiant_id) REFERENCES etudiant (id)');
        $this->addSql('ALTER TABLE accuiellir ADD CONSTRAINT FK_1C55FE231A867E8F FOREIGN KEY (id_entreprise_id) REFERENCES entreprise (id)');
        $this->addSql('ALTER TABLE prefere ADD CONSTRAINT FK_16BC7415A710BC5B FOREIGN KEY (id_specialisation_id) REFERENCES specialitee (id)');
        $this->addSql('ALTER TABLE prefere ADD CONSTRAINT FK_16BC7415F6B192E FOREIGN KEY (id_classe_id) REFERENCES classe (id)');
        $this->addSql('ALTER TABLE prefere_entreprise ADD CONSTRAINT FK_5AD54C56F528E7E8 FOREIGN KEY (prefere_id) REFERENCES prefere (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE prefere_entreprise ADD CONSTRAINT FK_5AD54C56A4AEAFEA FOREIGN KEY (entreprise_id) REFERENCES entreprise (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE preferer_specialitee ADD CONSTRAINT FK_2AF17F5F1E998ED FOREIGN KEY (preferer_id) REFERENCES preferer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE preferer_specialitee ADD CONSTRAINT FK_2AF17F52F9FD29A FOREIGN KEY (specialitee_id) REFERENCES specialitee (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE preferer_classe ADD CONSTRAINT FK_CE5BB4B4F1E998ED FOREIGN KEY (preferer_id) REFERENCES preferer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE preferer_classe ADD CONSTRAINT FK_CE5BB4B48F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE preferer_entreprise ADD CONSTRAINT FK_27218921F1E998ED FOREIGN KEY (preferer_id) REFERENCES preferer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE preferer_entreprise ADD CONSTRAINT FK_27218921A4AEAFEA FOREIGN KEY (entreprise_id) REFERENCES entreprise (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lier MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON lier');
        $this->addSql('ALTER TABLE lier DROP id');
        $this->addSql('ALTER TABLE lier ADD PRIMARY KEY (id_profil_id, id_salarie_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE accueillir_etudiant DROP FOREIGN KEY FK_64DAE3A47CEFB286');
        $this->addSql('ALTER TABLE accueillir_etudiant DROP FOREIGN KEY FK_64DAE3A4DDEAB1A3');
        $this->addSql('ALTER TABLE accueillir_specialitee DROP FOREIGN KEY FK_75D1442E7CEFB286');
        $this->addSql('ALTER TABLE accueillir_specialitee DROP FOREIGN KEY FK_75D1442E2F9FD29A');
        $this->addSql('ALTER TABLE accueillir_classe DROP FOREIGN KEY FK_D2F55F9B7CEFB286');
        $this->addSql('ALTER TABLE accueillir_classe DROP FOREIGN KEY FK_D2F55F9B8F5EA509');
        $this->addSql('ALTER TABLE accueillir_entreprise DROP FOREIGN KEY FK_5E42C4207CEFB286');
        $this->addSql('ALTER TABLE accueillir_entreprise DROP FOREIGN KEY FK_5E42C420A4AEAFEA');
        $this->addSql('ALTER TABLE accuiellir DROP FOREIGN KEY FK_1C55FE23F6B192E');
        $this->addSql('ALTER TABLE accuiellir DROP FOREIGN KEY FK_1C55FE2312F96F9C');
        $this->addSql('ALTER TABLE accuiellir DROP FOREIGN KEY FK_1C55FE23C5F87C54');
        $this->addSql('ALTER TABLE accuiellir DROP FOREIGN KEY FK_1C55FE231A867E8F');
        $this->addSql('ALTER TABLE prefere DROP FOREIGN KEY FK_16BC7415A710BC5B');
        $this->addSql('ALTER TABLE prefere DROP FOREIGN KEY FK_16BC7415F6B192E');
        $this->addSql('ALTER TABLE prefere_entreprise DROP FOREIGN KEY FK_5AD54C56F528E7E8');
        $this->addSql('ALTER TABLE prefere_entreprise DROP FOREIGN KEY FK_5AD54C56A4AEAFEA');
        $this->addSql('ALTER TABLE preferer_specialitee DROP FOREIGN KEY FK_2AF17F5F1E998ED');
        $this->addSql('ALTER TABLE preferer_specialitee DROP FOREIGN KEY FK_2AF17F52F9FD29A');
        $this->addSql('ALTER TABLE preferer_classe DROP FOREIGN KEY FK_CE5BB4B4F1E998ED');
        $this->addSql('ALTER TABLE preferer_classe DROP FOREIGN KEY FK_CE5BB4B48F5EA509');
        $this->addSql('ALTER TABLE preferer_entreprise DROP FOREIGN KEY FK_27218921F1E998ED');
        $this->addSql('ALTER TABLE preferer_entreprise DROP FOREIGN KEY FK_27218921A4AEAFEA');
        $this->addSql('DROP TABLE accueillir');
        $this->addSql('DROP TABLE accueillir_etudiant');
        $this->addSql('DROP TABLE accueillir_specialitee');
        $this->addSql('DROP TABLE accueillir_classe');
        $this->addSql('DROP TABLE accueillir_entreprise');
        $this->addSql('DROP TABLE accuiellir');
        $this->addSql('DROP TABLE prefere');
        $this->addSql('DROP TABLE prefere_entreprise');
        $this->addSql('DROP TABLE preferer');
        $this->addSql('DROP TABLE preferer_specialitee');
        $this->addSql('DROP TABLE preferer_classe');
        $this->addSql('DROP TABLE preferer_entreprise');
        $this->addSql('ALTER TABLE lier ADD id INT AUTO_INCREMENT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
    }
}
