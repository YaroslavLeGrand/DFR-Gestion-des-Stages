<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240328152823 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE accueillir_classe DROP FOREIGN KEY FK_D2F55F9B7CEFB286');
        $this->addSql('ALTER TABLE accueillir_classe DROP FOREIGN KEY FK_D2F55F9B8F5EA509');
        $this->addSql('ALTER TABLE accueillir_entreprise DROP FOREIGN KEY FK_5E42C4207CEFB286');
        $this->addSql('ALTER TABLE accueillir_entreprise DROP FOREIGN KEY FK_5E42C420A4AEAFEA');
        $this->addSql('ALTER TABLE accueillir_etudiant DROP FOREIGN KEY FK_64DAE3A4DDEAB1A3');
        $this->addSql('ALTER TABLE accueillir_etudiant DROP FOREIGN KEY FK_64DAE3A47CEFB286');
        $this->addSql('ALTER TABLE accueillir_specialitee DROP FOREIGN KEY FK_75D1442E2F9FD29A');
        $this->addSql('ALTER TABLE accueillir_specialitee DROP FOREIGN KEY FK_75D1442E7CEFB286');
        $this->addSql('ALTER TABLE accuiellir DROP FOREIGN KEY FK_1C55FE2312F96F9C');
        $this->addSql('ALTER TABLE accuiellir DROP FOREIGN KEY FK_1C55FE23F6B192E');
        $this->addSql('ALTER TABLE accuiellir DROP FOREIGN KEY FK_1C55FE231A867E8F');
        $this->addSql('ALTER TABLE accuiellir DROP FOREIGN KEY FK_1C55FE23C5F87C54');
        $this->addSql('DROP TABLE accueillir_classe');
        $this->addSql('DROP TABLE accueillir_entreprise');
        $this->addSql('DROP TABLE accueillir_etudiant');
        $this->addSql('DROP TABLE accueillir_specialitee');
        $this->addSql('DROP TABLE accuiellir');
        $this->addSql('ALTER TABLE accueillir MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON accueillir');
        $this->addSql('ALTER TABLE accueillir ADD id_classe_id INT NOT NULL, ADD id_specialitee_id INT NOT NULL, ADD id_etudiant_id INT NOT NULL, ADD id_entreprise_id INT NOT NULL, DROP id, CHANGE annee annee DATETIME NOT NULL');
        $this->addSql('ALTER TABLE accueillir ADD CONSTRAINT FK_AE67D359F6B192E FOREIGN KEY (id_classe_id) REFERENCES classe (id)');
        $this->addSql('ALTER TABLE accueillir ADD CONSTRAINT FK_AE67D35912F96F9C FOREIGN KEY (id_specialitee_id) REFERENCES specialitee (id)');
        $this->addSql('ALTER TABLE accueillir ADD CONSTRAINT FK_AE67D359C5F87C54 FOREIGN KEY (id_etudiant_id) REFERENCES etudiant (id)');
        $this->addSql('ALTER TABLE accueillir ADD CONSTRAINT FK_AE67D3591A867E8F FOREIGN KEY (id_entreprise_id) REFERENCES entreprise (id)');
        $this->addSql('CREATE INDEX IDX_AE67D359F6B192E ON accueillir (id_classe_id)');
        $this->addSql('CREATE INDEX IDX_AE67D35912F96F9C ON accueillir (id_specialitee_id)');
        $this->addSql('CREATE INDEX IDX_AE67D359C5F87C54 ON accueillir (id_etudiant_id)');
        $this->addSql('CREATE INDEX IDX_AE67D3591A867E8F ON accueillir (id_entreprise_id)');
        $this->addSql('ALTER TABLE accueillir ADD PRIMARY KEY (id_classe_id, id_specialitee_id, id_etudiant_id, id_entreprise_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE accueillir_classe (accueillir_id INT NOT NULL, classe_id INT NOT NULL, INDEX IDX_D2F55F9B8F5EA509 (classe_id), INDEX IDX_D2F55F9B7CEFB286 (accueillir_id), PRIMARY KEY(accueillir_id, classe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE accueillir_entreprise (accueillir_id INT NOT NULL, entreprise_id INT NOT NULL, INDEX IDX_5E42C420A4AEAFEA (entreprise_id), INDEX IDX_5E42C4207CEFB286 (accueillir_id), PRIMARY KEY(accueillir_id, entreprise_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE accueillir_etudiant (accueillir_id INT NOT NULL, etudiant_id INT NOT NULL, INDEX IDX_64DAE3A4DDEAB1A3 (etudiant_id), INDEX IDX_64DAE3A47CEFB286 (accueillir_id), PRIMARY KEY(accueillir_id, etudiant_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE accueillir_specialitee (accueillir_id INT NOT NULL, specialitee_id INT NOT NULL, INDEX IDX_75D1442E2F9FD29A (specialitee_id), INDEX IDX_75D1442E7CEFB286 (accueillir_id), PRIMARY KEY(accueillir_id, specialitee_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE accuiellir (id_classe_id INT NOT NULL, id_specialitee_id INT NOT NULL, id_etudiant_id INT NOT NULL, id_entreprise_id INT NOT NULL, annee DATETIME NOT NULL, INDEX IDX_1C55FE2312F96F9C (id_specialitee_id), INDEX IDX_1C55FE231A867E8F (id_entreprise_id), INDEX IDX_1C55FE23F6B192E (id_classe_id), INDEX IDX_1C55FE23C5F87C54 (id_etudiant_id), PRIMARY KEY(id_classe_id, id_specialitee_id, id_etudiant_id, id_entreprise_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE accueillir_classe ADD CONSTRAINT FK_D2F55F9B7CEFB286 FOREIGN KEY (accueillir_id) REFERENCES accueillir (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE accueillir_classe ADD CONSTRAINT FK_D2F55F9B8F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE accueillir_entreprise ADD CONSTRAINT FK_5E42C4207CEFB286 FOREIGN KEY (accueillir_id) REFERENCES accueillir (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE accueillir_entreprise ADD CONSTRAINT FK_5E42C420A4AEAFEA FOREIGN KEY (entreprise_id) REFERENCES entreprise (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE accueillir_etudiant ADD CONSTRAINT FK_64DAE3A4DDEAB1A3 FOREIGN KEY (etudiant_id) REFERENCES etudiant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE accueillir_etudiant ADD CONSTRAINT FK_64DAE3A47CEFB286 FOREIGN KEY (accueillir_id) REFERENCES accueillir (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE accueillir_specialitee ADD CONSTRAINT FK_75D1442E2F9FD29A FOREIGN KEY (specialitee_id) REFERENCES specialitee (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE accueillir_specialitee ADD CONSTRAINT FK_75D1442E7CEFB286 FOREIGN KEY (accueillir_id) REFERENCES accueillir (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE accuiellir ADD CONSTRAINT FK_1C55FE2312F96F9C FOREIGN KEY (id_specialitee_id) REFERENCES specialitee (id)');
        $this->addSql('ALTER TABLE accuiellir ADD CONSTRAINT FK_1C55FE23F6B192E FOREIGN KEY (id_classe_id) REFERENCES classe (id)');
        $this->addSql('ALTER TABLE accuiellir ADD CONSTRAINT FK_1C55FE231A867E8F FOREIGN KEY (id_entreprise_id) REFERENCES entreprise (id)');
        $this->addSql('ALTER TABLE accuiellir ADD CONSTRAINT FK_1C55FE23C5F87C54 FOREIGN KEY (id_etudiant_id) REFERENCES etudiant (id)');
        $this->addSql('ALTER TABLE accueillir DROP FOREIGN KEY FK_AE67D359F6B192E');
        $this->addSql('ALTER TABLE accueillir DROP FOREIGN KEY FK_AE67D35912F96F9C');
        $this->addSql('ALTER TABLE accueillir DROP FOREIGN KEY FK_AE67D359C5F87C54');
        $this->addSql('ALTER TABLE accueillir DROP FOREIGN KEY FK_AE67D3591A867E8F');
        $this->addSql('DROP INDEX IDX_AE67D359F6B192E ON accueillir');
        $this->addSql('DROP INDEX IDX_AE67D35912F96F9C ON accueillir');
        $this->addSql('DROP INDEX IDX_AE67D359C5F87C54 ON accueillir');
        $this->addSql('DROP INDEX IDX_AE67D3591A867E8F ON accueillir');
        $this->addSql('ALTER TABLE accueillir ADD id INT AUTO_INCREMENT NOT NULL, DROP id_classe_id, DROP id_specialitee_id, DROP id_etudiant_id, DROP id_entreprise_id, CHANGE annee annee DATE NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
    }
}
