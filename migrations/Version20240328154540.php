<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240328154540 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE preferer_classe DROP FOREIGN KEY FK_CE5BB4B48F5EA509');
        $this->addSql('ALTER TABLE preferer_classe DROP FOREIGN KEY FK_CE5BB4B4F1E998ED');
        $this->addSql('ALTER TABLE preferer_entreprise DROP FOREIGN KEY FK_27218921A4AEAFEA');
        $this->addSql('ALTER TABLE preferer_entreprise DROP FOREIGN KEY FK_27218921F1E998ED');
        $this->addSql('ALTER TABLE preferer_specialitee DROP FOREIGN KEY FK_2AF17F5F1E998ED');
        $this->addSql('ALTER TABLE preferer_specialitee DROP FOREIGN KEY FK_2AF17F52F9FD29A');
        $this->addSql('DROP TABLE preferer_classe');
        $this->addSql('DROP TABLE preferer_entreprise');
        $this->addSql('DROP TABLE preferer_specialitee');
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
        $this->addSql('CREATE TABLE preferer_classe (preferer_id INT NOT NULL, classe_id INT NOT NULL, INDEX IDX_CE5BB4B48F5EA509 (classe_id), INDEX IDX_CE5BB4B4F1E998ED (preferer_id), PRIMARY KEY(preferer_id, classe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE preferer_entreprise (preferer_id INT NOT NULL, entreprise_id INT NOT NULL, INDEX IDX_27218921A4AEAFEA (entreprise_id), INDEX IDX_27218921F1E998ED (preferer_id), PRIMARY KEY(preferer_id, entreprise_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE preferer_specialitee (preferer_id INT NOT NULL, specialitee_id INT NOT NULL, INDEX IDX_2AF17F52F9FD29A (specialitee_id), INDEX IDX_2AF17F5F1E998ED (preferer_id), PRIMARY KEY(preferer_id, specialitee_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE preferer_classe ADD CONSTRAINT FK_CE5BB4B48F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE preferer_classe ADD CONSTRAINT FK_CE5BB4B4F1E998ED FOREIGN KEY (preferer_id) REFERENCES preferer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE preferer_entreprise ADD CONSTRAINT FK_27218921A4AEAFEA FOREIGN KEY (entreprise_id) REFERENCES entreprise (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE preferer_entreprise ADD CONSTRAINT FK_27218921F1E998ED FOREIGN KEY (preferer_id) REFERENCES preferer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE preferer_specialitee ADD CONSTRAINT FK_2AF17F5F1E998ED FOREIGN KEY (preferer_id) REFERENCES preferer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE preferer_specialitee ADD CONSTRAINT FK_2AF17F52F9FD29A FOREIGN KEY (specialitee_id) REFERENCES specialitee (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE preferer DROP FOREIGN KEY FK_1C2A70212F96F9C');
        $this->addSql('ALTER TABLE preferer DROP FOREIGN KEY FK_1C2A702F6B192E');
        $this->addSql('ALTER TABLE preferer DROP FOREIGN KEY FK_1C2A7021A867E8F');
        $this->addSql('DROP INDEX IDX_1C2A70212F96F9C ON preferer');
        $this->addSql('DROP INDEX IDX_1C2A702F6B192E ON preferer');
        $this->addSql('DROP INDEX IDX_1C2A7021A867E8F ON preferer');
        $this->addSql('ALTER TABLE preferer DROP id_specialitee_id, DROP id_classe_id, DROP id_entreprise_id');
    }
}
