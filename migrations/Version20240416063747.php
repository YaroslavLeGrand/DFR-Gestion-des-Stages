<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240416063747 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE UNIQUE INDEX UNIQ_AE67D359DE92C5CF ON accueillir (annee)');
        $this->addSql('ALTER TABLE preferer ADD id INT AUTO_INCREMENT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_AE67D359DE92C5CF ON accueillir');
        $this->addSql('ALTER TABLE preferer MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON preferer');
        $this->addSql('ALTER TABLE preferer DROP id');
        $this->addSql('ALTER TABLE preferer ADD PRIMARY KEY (id_specialitee_id, id_classe_id, id_entreprise_id)');
    }
}
