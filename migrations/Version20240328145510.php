<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240328145510 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prefere DROP FOREIGN KEY FK_16BC7415A710BC5B');
        $this->addSql('ALTER TABLE prefere DROP FOREIGN KEY FK_16BC7415F6B192E');
        $this->addSql('ALTER TABLE prefere_entreprise DROP FOREIGN KEY FK_5AD54C56F528E7E8');
        $this->addSql('ALTER TABLE prefere_entreprise DROP FOREIGN KEY FK_5AD54C56A4AEAFEA');
        $this->addSql('DROP TABLE prefere');
        $this->addSql('DROP TABLE prefere_entreprise');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE prefere (id INT AUTO_INCREMENT NOT NULL, id_specialisation_id INT DEFAULT NULL, id_classe_id INT DEFAULT NULL, INDEX IDX_16BC7415A710BC5B (id_specialisation_id), INDEX IDX_16BC7415F6B192E (id_classe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE prefere_entreprise (prefere_id INT NOT NULL, entreprise_id INT NOT NULL, INDEX IDX_5AD54C56F528E7E8 (prefere_id), INDEX IDX_5AD54C56A4AEAFEA (entreprise_id), PRIMARY KEY(prefere_id, entreprise_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE prefere ADD CONSTRAINT FK_16BC7415A710BC5B FOREIGN KEY (id_specialisation_id) REFERENCES specialitee (id)');
        $this->addSql('ALTER TABLE prefere ADD CONSTRAINT FK_16BC7415F6B192E FOREIGN KEY (id_classe_id) REFERENCES classe (id)');
        $this->addSql('ALTER TABLE prefere_entreprise ADD CONSTRAINT FK_5AD54C56F528E7E8 FOREIGN KEY (prefere_id) REFERENCES prefere (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE prefere_entreprise ADD CONSTRAINT FK_5AD54C56A4AEAFEA FOREIGN KEY (entreprise_id) REFERENCES entreprise (id) ON DELETE CASCADE');
    }
}
