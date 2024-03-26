<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240326085702 extends AbstractMigration
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
        $this->addSql('CREATE TABLE classe (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE email (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etudiant (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(38) DEFAULT NULL, prenom VARCHAR(38) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lier (id INT AUTO_INCREMENT NOT NULL, annee DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lier_profil (lier_id INT NOT NULL, profil_id INT NOT NULL, INDEX IDX_66B342C5F7652B75 (lier_id), INDEX IDX_66B342C5275ED078 (profil_id), PRIMARY KEY(lier_id, profil_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lier_salarie (lier_id INT NOT NULL, salarie_id INT NOT NULL, INDEX IDX_76B6F32F7652B75 (lier_id), INDEX IDX_76B6F325859934A (salarie_id), PRIMARY KEY(lier_id, salarie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE poste (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE preferer (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE preferer_specialitee (preferer_id INT NOT NULL, specialitee_id INT NOT NULL, INDEX IDX_2AF17F5F1E998ED (preferer_id), INDEX IDX_2AF17F52F9FD29A (specialitee_id), PRIMARY KEY(preferer_id, specialitee_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE preferer_classe (preferer_id INT NOT NULL, classe_id INT NOT NULL, INDEX IDX_CE5BB4B4F1E998ED (preferer_id), INDEX IDX_CE5BB4B48F5EA509 (classe_id), PRIMARY KEY(preferer_id, classe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE preferer_entreprise (preferer_id INT NOT NULL, entreprise_id INT NOT NULL, INDEX IDX_27218921F1E998ED (preferer_id), INDEX IDX_27218921A4AEAFEA (entreprise_id), PRIMARY KEY(preferer_id, entreprise_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profil (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salarie (id INT AUTO_INCREMENT NOT NULL, id_poste_id INT DEFAULT NULL, id_entreprise_id INT DEFAULT NULL, nom VARCHAR(38) DEFAULT NULL, prenom VARCHAR(38) DEFAULT NULL, INDEX IDX_828E3A1AF04BBC13 (id_poste_id), INDEX IDX_828E3A1A1A867E8F (id_entreprise_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salarie_telephone (salarie_id INT NOT NULL, telephone_id INT NOT NULL, INDEX IDX_DA3866535859934A (salarie_id), INDEX IDX_DA386653FE649A29 (telephone_id), PRIMARY KEY(salarie_id, telephone_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salarie_email (salarie_id INT NOT NULL, email_id INT NOT NULL, INDEX IDX_CB411FD45859934A (salarie_id), INDEX IDX_CB411FD4A832C1C9 (email_id), PRIMARY KEY(salarie_id, email_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE specialitee (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE telephone (id INT AUTO_INCREMENT NOT NULL, telephone VARCHAR(15) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE accueillir_etudiant ADD CONSTRAINT FK_64DAE3A47CEFB286 FOREIGN KEY (accueillir_id) REFERENCES accueillir (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE accueillir_etudiant ADD CONSTRAINT FK_64DAE3A4DDEAB1A3 FOREIGN KEY (etudiant_id) REFERENCES etudiant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE accueillir_specialitee ADD CONSTRAINT FK_75D1442E7CEFB286 FOREIGN KEY (accueillir_id) REFERENCES accueillir (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE accueillir_specialitee ADD CONSTRAINT FK_75D1442E2F9FD29A FOREIGN KEY (specialitee_id) REFERENCES specialitee (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE accueillir_classe ADD CONSTRAINT FK_D2F55F9B7CEFB286 FOREIGN KEY (accueillir_id) REFERENCES accueillir (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE accueillir_classe ADD CONSTRAINT FK_D2F55F9B8F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE accueillir_entreprise ADD CONSTRAINT FK_5E42C4207CEFB286 FOREIGN KEY (accueillir_id) REFERENCES accueillir (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE accueillir_entreprise ADD CONSTRAINT FK_5E42C420A4AEAFEA FOREIGN KEY (entreprise_id) REFERENCES entreprise (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lier_profil ADD CONSTRAINT FK_66B342C5F7652B75 FOREIGN KEY (lier_id) REFERENCES lier (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lier_profil ADD CONSTRAINT FK_66B342C5275ED078 FOREIGN KEY (profil_id) REFERENCES profil (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lier_salarie ADD CONSTRAINT FK_76B6F32F7652B75 FOREIGN KEY (lier_id) REFERENCES lier (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lier_salarie ADD CONSTRAINT FK_76B6F325859934A FOREIGN KEY (salarie_id) REFERENCES salarie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE preferer_specialitee ADD CONSTRAINT FK_2AF17F5F1E998ED FOREIGN KEY (preferer_id) REFERENCES preferer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE preferer_specialitee ADD CONSTRAINT FK_2AF17F52F9FD29A FOREIGN KEY (specialitee_id) REFERENCES specialitee (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE preferer_classe ADD CONSTRAINT FK_CE5BB4B4F1E998ED FOREIGN KEY (preferer_id) REFERENCES preferer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE preferer_classe ADD CONSTRAINT FK_CE5BB4B48F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE preferer_entreprise ADD CONSTRAINT FK_27218921F1E998ED FOREIGN KEY (preferer_id) REFERENCES preferer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE preferer_entreprise ADD CONSTRAINT FK_27218921A4AEAFEA FOREIGN KEY (entreprise_id) REFERENCES entreprise (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE salarie ADD CONSTRAINT FK_828E3A1AF04BBC13 FOREIGN KEY (id_poste_id) REFERENCES poste (id)');
        $this->addSql('ALTER TABLE salarie ADD CONSTRAINT FK_828E3A1A1A867E8F FOREIGN KEY (id_entreprise_id) REFERENCES entreprise (id)');
        $this->addSql('ALTER TABLE salarie_telephone ADD CONSTRAINT FK_DA3866535859934A FOREIGN KEY (salarie_id) REFERENCES salarie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE salarie_telephone ADD CONSTRAINT FK_DA386653FE649A29 FOREIGN KEY (telephone_id) REFERENCES telephone (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE salarie_email ADD CONSTRAINT FK_CB411FD45859934A FOREIGN KEY (salarie_id) REFERENCES salarie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE salarie_email ADD CONSTRAINT FK_CB411FD4A832C1C9 FOREIGN KEY (email_id) REFERENCES email (id) ON DELETE CASCADE');
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
        $this->addSql('ALTER TABLE lier_profil DROP FOREIGN KEY FK_66B342C5F7652B75');
        $this->addSql('ALTER TABLE lier_profil DROP FOREIGN KEY FK_66B342C5275ED078');
        $this->addSql('ALTER TABLE lier_salarie DROP FOREIGN KEY FK_76B6F32F7652B75');
        $this->addSql('ALTER TABLE lier_salarie DROP FOREIGN KEY FK_76B6F325859934A');
        $this->addSql('ALTER TABLE preferer_specialitee DROP FOREIGN KEY FK_2AF17F5F1E998ED');
        $this->addSql('ALTER TABLE preferer_specialitee DROP FOREIGN KEY FK_2AF17F52F9FD29A');
        $this->addSql('ALTER TABLE preferer_classe DROP FOREIGN KEY FK_CE5BB4B4F1E998ED');
        $this->addSql('ALTER TABLE preferer_classe DROP FOREIGN KEY FK_CE5BB4B48F5EA509');
        $this->addSql('ALTER TABLE preferer_entreprise DROP FOREIGN KEY FK_27218921F1E998ED');
        $this->addSql('ALTER TABLE preferer_entreprise DROP FOREIGN KEY FK_27218921A4AEAFEA');
        $this->addSql('ALTER TABLE salarie DROP FOREIGN KEY FK_828E3A1AF04BBC13');
        $this->addSql('ALTER TABLE salarie DROP FOREIGN KEY FK_828E3A1A1A867E8F');
        $this->addSql('ALTER TABLE salarie_telephone DROP FOREIGN KEY FK_DA3866535859934A');
        $this->addSql('ALTER TABLE salarie_telephone DROP FOREIGN KEY FK_DA386653FE649A29');
        $this->addSql('ALTER TABLE salarie_email DROP FOREIGN KEY FK_CB411FD45859934A');
        $this->addSql('ALTER TABLE salarie_email DROP FOREIGN KEY FK_CB411FD4A832C1C9');
        $this->addSql('DROP TABLE accueillir');
        $this->addSql('DROP TABLE accueillir_etudiant');
        $this->addSql('DROP TABLE accueillir_specialitee');
        $this->addSql('DROP TABLE accueillir_classe');
        $this->addSql('DROP TABLE accueillir_entreprise');
        $this->addSql('DROP TABLE classe');
        $this->addSql('DROP TABLE email');
        $this->addSql('DROP TABLE etudiant');
        $this->addSql('DROP TABLE lier');
        $this->addSql('DROP TABLE lier_profil');
        $this->addSql('DROP TABLE lier_salarie');
        $this->addSql('DROP TABLE poste');
        $this->addSql('DROP TABLE preferer');
        $this->addSql('DROP TABLE preferer_specialitee');
        $this->addSql('DROP TABLE preferer_classe');
        $this->addSql('DROP TABLE preferer_entreprise');
        $this->addSql('DROP TABLE profil');
        $this->addSql('DROP TABLE salarie');
        $this->addSql('DROP TABLE salarie_telephone');
        $this->addSql('DROP TABLE salarie_email');
        $this->addSql('DROP TABLE specialitee');
        $this->addSql('DROP TABLE telephone');
    }
}
