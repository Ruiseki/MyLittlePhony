<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221103103558 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE business (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, phone INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skills (id INT AUTO_INCREMENT NOT NULL, skills_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_D53116707FF61858 (skills_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE skills ADD CONSTRAINT FK_D53116707FF61858 FOREIGN KEY (skills_id) REFERENCES business (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE skills DROP FOREIGN KEY FK_D53116707FF61858');
        $this->addSql('DROP TABLE business');
        $this->addSql('DROP TABLE skills');
    }
}
