<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200321093908 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE verifie_suspect');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE verifie_suspect (id INT AUTO_INCREMENT NOT NULL, mal_de_tete TINYINT(1) NOT NULL, toux TINYINT(1) NOT NULL, gorge_irritee TINYINT(1) NOT NULL, fievre TINYINT(1) NOT NULL, sentiment_general_de_malaise TINYINT(1) NOT NULL, gene_respiratoire TINYINT(1) NOT NULL, fatigue_innabituelle TINYINT(1) NOT NULL, alimentation_difficile TINYINT(1) NOT NULL, courbature TINYINT(1) NOT NULL, voyage TINYINT(1) NOT NULL, en_contact TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
    }
}
