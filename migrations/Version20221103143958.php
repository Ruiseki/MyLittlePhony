<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221103143958 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE skills DROP FOREIGN KEY FK_D531167048704627');
        $this->addSql('DROP INDEX IDX_D531167048704627 ON skills');
        $this->addSql('ALTER TABLE skills DROP jobs_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE skills ADD jobs_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE skills ADD CONSTRAINT FK_D531167048704627 FOREIGN KEY (jobs_id) REFERENCES jobs (id)');
        $this->addSql('CREATE INDEX IDX_D531167048704627 ON skills (jobs_id)');
    }
}
