<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240404142900 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE preferer MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON preferer');
        $this->addSql('ALTER TABLE preferer DROP id, CHANGE id_specialitee_id id_specialitee_id INT NOT NULL, CHANGE id_classe_id id_classe_id INT NOT NULL, CHANGE id_entreprise_id id_entreprise_id INT NOT NULL');
        $this->addSql('ALTER TABLE preferer ADD PRIMARY KEY (id_specialitee_id, id_classe_id, id_entreprise_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE preferer ADD id INT AUTO_INCREMENT NOT NULL, CHANGE id_specialitee_id id_specialitee_id INT DEFAULT NULL, CHANGE id_classe_id id_classe_id INT DEFAULT NULL, CHANGE id_entreprise_id id_entreprise_id INT DEFAULT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
    }
}
