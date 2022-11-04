<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221104095625 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE profile (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profile_skills (profile_id INT NOT NULL, skills_id INT NOT NULL, INDEX IDX_BD1B7117CCFA12B8 (profile_id), INDEX IDX_BD1B71177FF61858 (skills_id), PRIMARY KEY(profile_id, skills_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE profile_skills ADD CONSTRAINT FK_BD1B7117CCFA12B8 FOREIGN KEY (profile_id) REFERENCES profile (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE profile_skills ADD CONSTRAINT FK_BD1B71177FF61858 FOREIGN KEY (skills_id) REFERENCES skills (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE profils_skills DROP FOREIGN KEY FK_7CF49BB7FF61858');
        $this->addSql('ALTER TABLE profils_skills DROP FOREIGN KEY FK_7CF49BBB9881AFB');
        $this->addSql('DROP TABLE profils');
        $this->addSql('DROP TABLE profils_skills');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE profils (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE profils_skills (profils_id INT NOT NULL, skills_id INT NOT NULL, INDEX IDX_7CF49BBB9881AFB (profils_id), INDEX IDX_7CF49BB7FF61858 (skills_id), PRIMARY KEY(profils_id, skills_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE profils_skills ADD CONSTRAINT FK_7CF49BB7FF61858 FOREIGN KEY (skills_id) REFERENCES skills (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE profils_skills ADD CONSTRAINT FK_7CF49BBB9881AFB FOREIGN KEY (profils_id) REFERENCES profils (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE profile_skills DROP FOREIGN KEY FK_BD1B7117CCFA12B8');
        $this->addSql('ALTER TABLE profile_skills DROP FOREIGN KEY FK_BD1B71177FF61858');
        $this->addSql('DROP TABLE profile');
        $this->addSql('DROP TABLE profile_skills');
    }
}
