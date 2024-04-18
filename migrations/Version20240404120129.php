<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240404120129 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE classe (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE email (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entreprise (id INT AUTO_INCREMENT NOT NULL, rs VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, pays VARCHAR(255) NOT NULL, activitee VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etudiant (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(38) DEFAULT NULL, prenom VARCHAR(38) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lier (id_profil_id INT NOT NULL, id_salarie_id INT NOT NULL, annee DATETIME DEFAULT NULL, INDEX IDX_B133E8FAA76B6C5F (id_profil_id), INDEX IDX_B133E8FAFDD3139D (id_salarie_id), PRIMARY KEY(id_profil_id, id_salarie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE poste (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salarie (id INT AUTO_INCREMENT NOT NULL, id_poste_id INT DEFAULT NULL, id_entreprise_id INT DEFAULT NULL, nom VARCHAR(38) DEFAULT NULL, prenom VARCHAR(38) DEFAULT NULL, INDEX IDX_828E3A1AF04BBC13 (id_poste_id), INDEX IDX_828E3A1A1A867E8F (id_entreprise_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salarie_telephone (salarie_id INT NOT NULL, telephone_id INT NOT NULL, INDEX IDX_DA3866535859934A (salarie_id), INDEX IDX_DA386653FE649A29 (telephone_id), PRIMARY KEY(salarie_id, telephone_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salarie_email (salarie_id INT NOT NULL, email_id INT NOT NULL, INDEX IDX_CB411FD45859934A (salarie_id), INDEX IDX_CB411FD4A832C1C9 (email_id), PRIMARY KEY(salarie_id, email_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE specialitee (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE telephone (id INT AUTO_INCREMENT NOT NULL, telephone VARCHAR(15) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, id_role_id INT NOT NULL, identifiant VARCHAR(255) NOT NULL, mot_de_passe VARCHAR(255) NOT NULL, INDEX IDX_1D1C63B389E8BDC (id_role_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE lier ADD CONSTRAINT FK_B133E8FAA76B6C5F FOREIGN KEY (id_profil_id) REFERENCES profil (id)');
        $this->addSql('ALTER TABLE lier ADD CONSTRAINT FK_B133E8FAFDD3139D FOREIGN KEY (id_salarie_id) REFERENCES salarie (id)');
        $this->addSql('ALTER TABLE salarie ADD CONSTRAINT FK_828E3A1AF04BBC13 FOREIGN KEY (id_poste_id) REFERENCES poste (id)');
        $this->addSql('ALTER TABLE salarie ADD CONSTRAINT FK_828E3A1A1A867E8F FOREIGN KEY (id_entreprise_id) REFERENCES entreprise (id)');
        $this->addSql('ALTER TABLE salarie_telephone ADD CONSTRAINT FK_DA3866535859934A FOREIGN KEY (salarie_id) REFERENCES salarie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE salarie_telephone ADD CONSTRAINT FK_DA386653FE649A29 FOREIGN KEY (telephone_id) REFERENCES telephone (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE salarie_email ADD CONSTRAINT FK_CB411FD45859934A FOREIGN KEY (salarie_id) REFERENCES salarie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE salarie_email ADD CONSTRAINT FK_CB411FD4A832C1C9 FOREIGN KEY (email_id) REFERENCES email (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B389E8BDC FOREIGN KEY (id_role_id) REFERENCES role (id)');
        $this->addSql('ALTER TABLE accueillir_etudiant DROP FOREIGN KEY FK_64DAE3A47CEFB286');
        $this->addSql('DROP TABLE accueillir_classe');
        $this->addSql('DROP TABLE accueillir_entreprise');
        $this->addSql('DROP TABLE accueillir_etudiant');
        $this->addSql('DROP TABLE accueillir_specialitee');
        $this->addSql('DROP TABLE accuiellir');
        $this->addSql('DROP TABLE prefere');
        $this->addSql('DROP TABLE prefere_entreprise');
        $this->addSql('DROP TABLE preferer_classe');
        $this->addSql('DROP TABLE preferer_entreprise');
        $this->addSql('DROP TABLE preferer_specialitee');
        $this->addSql('ALTER TABLE accueillir MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON accueillir');
        $this->addSql('ALTER TABLE accueillir ADD id_classe_id INT NOT NULL, ADD id_specialitee_id INT NOT NULL, ADD id_etudiant_id INT NOT NULL, ADD id_entreprise_id INT NOT NULL, DROP id, CHANGE annee annee DATETIME NOT NULL');
        $this->addSql('ALTER TABLE accueillir ADD CONSTRAINT FK_AE67D359F6B192E FOREIGN KEY (id_classe_id) REFERENCES classe (id)');
        $this->addSql('ALTER TABLE accueillir ADD CONSTRAINT FK_AE67D35912F96F9C FOREIGN KEY (id_specialitee_id) REFERENCES specialitee (id)');
        $this->addSql('ALTER TABLE accueillir ADD CONSTRAINT FK_AE67D359C5F87C54 FOREIGN KEY (id_etudiant_id) REFERENCES etudiant (id)');
        $this->addSql('ALTER TABLE accueillir ADD CONSTRAINT FK_AE67D3591A867E8F FOREIGN KEY (id_entreprise_id) REFERENCES entreprise (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_AE67D359DE92C5CF ON accueillir (annee)');
        $this->addSql('CREATE INDEX IDX_AE67D359F6B192E ON accueillir (id_classe_id)');
        $this->addSql('CREATE INDEX IDX_AE67D35912F96F9C ON accueillir (id_specialitee_id)');
        $this->addSql('CREATE INDEX IDX_AE67D359C5F87C54 ON accueillir (id_etudiant_id)');
        $this->addSql('CREATE INDEX IDX_AE67D3591A867E8F ON accueillir (id_entreprise_id)');
        $this->addSql('ALTER TABLE accueillir ADD PRIMARY KEY (id_classe_id, id_specialitee_id, id_etudiant_id, id_entreprise_id)');
        $this->addSql('ALTER TABLE preferer ADD id_specialitee_id INT DEFAULT NULL, ADD id_classe_id INT DEFAULT NULL, ADD id_entreprise_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE preferer ADD CONSTRAINT FK_1C2A70212F96F9C FOREIGN KEY (id_specialitee_id) REFERENCES specialitee (id)');
        $this->addSql('ALTER TABLE preferer ADD CONSTRAINT FK_1C2A702F6B192E FOREIGN KEY (id_classe_id) REFERENCES classe (id)');
        $this->addSql('ALTER TABLE preferer ADD CONSTRAINT FK_1C2A7021A867E8F FOREIGN KEY (id_entreprise_id) REFERENCES entreprise (id)');
        $this->addSql('CREATE INDEX IDX_1C2A70212F96F9C ON preferer (id_specialitee_id)');
        $this->addSql('CREATE INDEX IDX_1C2A702F6B192E ON preferer (id_classe_id)');
        $this->addSql('CREATE INDEX IDX_1C2A7021A867E8F ON preferer (id_entreprise_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE accueillir DROP FOREIGN KEY FK_AE67D359F6B192E');
        $this->addSql('ALTER TABLE preferer DROP FOREIGN KEY FK_1C2A702F6B192E');
        $this->addSql('ALTER TABLE accueillir DROP FOREIGN KEY FK_AE67D3591A867E8F');
        $this->addSql('ALTER TABLE preferer DROP FOREIGN KEY FK_1C2A7021A867E8F');
        $this->addSql('ALTER TABLE accueillir DROP FOREIGN KEY FK_AE67D359C5F87C54');
        $this->addSql('ALTER TABLE accueillir DROP FOREIGN KEY FK_AE67D35912F96F9C');
        $this->addSql('ALTER TABLE preferer DROP FOREIGN KEY FK_1C2A70212F96F9C');
        $this->addSql('CREATE TABLE accueillir_classe (accueillir_id INT NOT NULL, classe_id INT NOT NULL, INDEX IDX_D2F55F9B8F5EA509 (classe_id), INDEX IDX_D2F55F9B7CEFB286 (accueillir_id), PRIMARY KEY(accueillir_id, classe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE accueillir_entreprise (accueillir_id INT NOT NULL, entreprise_id INT NOT NULL, INDEX IDX_5E42C420A4AEAFEA (entreprise_id), INDEX IDX_5E42C4207CEFB286 (accueillir_id), PRIMARY KEY(accueillir_id, entreprise_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE accueillir_etudiant (accueillir_id INT NOT NULL, etudiant_id INT NOT NULL, INDEX IDX_64DAE3A4DDEAB1A3 (etudiant_id), INDEX IDX_64DAE3A47CEFB286 (accueillir_id), PRIMARY KEY(accueillir_id, etudiant_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE accueillir_specialitee (accueillir_id INT NOT NULL, specialitee_id INT NOT NULL, INDEX IDX_75D1442E2F9FD29A (specialitee_id), INDEX IDX_75D1442E7CEFB286 (accueillir_id), PRIMARY KEY(accueillir_id, specialitee_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE accuiellir (id_classe_id INT NOT NULL, id_specialitee_id INT NOT NULL, id_etudiant_id INT NOT NULL, id_entreprise_id INT NOT NULL, annee DATETIME NOT NULL, INDEX IDX_1C55FE2312F96F9C (id_specialitee_id), INDEX IDX_1C55FE231A867E8F (id_entreprise_id), INDEX IDX_1C55FE23F6B192E (id_classe_id), INDEX IDX_1C55FE23C5F87C54 (id_etudiant_id), PRIMARY KEY(id_classe_id, id_specialitee_id, id_etudiant_id, id_entreprise_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE prefere (id INT AUTO_INCREMENT NOT NULL, id_specialisation_id INT DEFAULT NULL, id_classe_id INT DEFAULT NULL, INDEX IDX_16BC7415F6B192E (id_classe_id), INDEX IDX_16BC7415A710BC5B (id_specialisation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE prefere_entreprise (prefere_id INT NOT NULL, entreprise_id INT NOT NULL, INDEX IDX_5AD54C56A4AEAFEA (entreprise_id), INDEX IDX_5AD54C56F528E7E8 (prefere_id), PRIMARY KEY(prefere_id, entreprise_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE preferer_classe (preferer_id INT NOT NULL, classe_id INT NOT NULL, INDEX IDX_CE5BB4B4F1E998ED (preferer_id), INDEX IDX_CE5BB4B48F5EA509 (classe_id), PRIMARY KEY(preferer_id, classe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE preferer_entreprise (preferer_id INT NOT NULL, entreprise_id INT NOT NULL, INDEX IDX_27218921F1E998ED (preferer_id), INDEX IDX_27218921A4AEAFEA (entreprise_id), PRIMARY KEY(preferer_id, entreprise_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE preferer_specialitee (preferer_id INT NOT NULL, specialitee_id INT NOT NULL, INDEX IDX_2AF17F5F1E998ED (preferer_id), INDEX IDX_2AF17F52F9FD29A (specialitee_id), PRIMARY KEY(preferer_id, specialitee_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE accueillir_etudiant ADD CONSTRAINT FK_64DAE3A47CEFB286 FOREIGN KEY (accueillir_id) REFERENCES accueillir (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lier DROP FOREIGN KEY FK_B133E8FAA76B6C5F');
        $this->addSql('ALTER TABLE lier DROP FOREIGN KEY FK_B133E8FAFDD3139D');
        $this->addSql('ALTER TABLE salarie DROP FOREIGN KEY FK_828E3A1AF04BBC13');
        $this->addSql('ALTER TABLE salarie DROP FOREIGN KEY FK_828E3A1A1A867E8F');
        $this->addSql('ALTER TABLE salarie_telephone DROP FOREIGN KEY FK_DA3866535859934A');
        $this->addSql('ALTER TABLE salarie_telephone DROP FOREIGN KEY FK_DA386653FE649A29');
        $this->addSql('ALTER TABLE salarie_email DROP FOREIGN KEY FK_CB411FD45859934A');
        $this->addSql('ALTER TABLE salarie_email DROP FOREIGN KEY FK_CB411FD4A832C1C9');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B389E8BDC');
        $this->addSql('DROP TABLE classe');
        $this->addSql('DROP TABLE email');
        $this->addSql('DROP TABLE entreprise');
        $this->addSql('DROP TABLE etudiant');
        $this->addSql('DROP TABLE lier');
        $this->addSql('DROP TABLE poste');
        $this->addSql('DROP TABLE profil');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE salarie');
        $this->addSql('DROP TABLE salarie_telephone');
        $this->addSql('DROP TABLE salarie_email');
        $this->addSql('DROP TABLE specialitee');
        $this->addSql('DROP TABLE telephone');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP INDEX UNIQ_AE67D359DE92C5CF ON accueillir');
        $this->addSql('DROP INDEX IDX_AE67D359F6B192E ON accueillir');
        $this->addSql('DROP INDEX IDX_AE67D35912F96F9C ON accueillir');
        $this->addSql('DROP INDEX IDX_AE67D359C5F87C54 ON accueillir');
        $this->addSql('DROP INDEX IDX_AE67D3591A867E8F ON accueillir');
        $this->addSql('ALTER TABLE accueillir ADD id INT AUTO_INCREMENT NOT NULL, DROP id_classe_id, DROP id_specialitee_id, DROP id_etudiant_id, DROP id_entreprise_id, CHANGE annee annee DATE NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('DROP INDEX IDX_1C2A70212F96F9C ON preferer');
        $this->addSql('DROP INDEX IDX_1C2A702F6B192E ON preferer');
        $this->addSql('DROP INDEX IDX_1C2A7021A867E8F ON preferer');
        $this->addSql('ALTER TABLE preferer DROP id_specialitee_id, DROP id_classe_id, DROP id_entreprise_id');
    }
}
