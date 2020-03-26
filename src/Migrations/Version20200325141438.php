<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200325141438 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE cas (id INT AUTO_INCREMENT NOT NULL, lieu_id INT NOT NULL, nouveau_cas INT NOT NULL, total_cas INT NOT NULL, nouveau_deces INT NOT NULL, total_deces INT NOT NULL, date DATE NOT NULL, cas_contacts INT NOT NULL, cas_communautaires INT NOT NULL, cas_importes INT NOT NULL, nouveaux_gueris INT NOT NULL, total_gueris INT NOT NULL, INDEX IDX_3AD60B6AB213CC (lieu_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE faq (id INT AUTO_INCREMENT NOT NULL, question LONGTEXT NOT NULL, reponse LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lieu (id INT AUTO_INCREMENT NOT NULL, region VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media_object (id INT AUTO_INCREMENT NOT NULL, file_path VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recommandation (id INT AUTO_INCREMENT NOT NULL, texte_recommande LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sensibilisation (id INT AUTO_INCREMENT NOT NULL, image_id INT DEFAULT NULL, texte LONGTEXT DEFAULT NULL, INDEX IDX_3ABCFD903DA5256D (image_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, role_id INT NOT NULL, username VARCHAR(180) NOT NULL, password VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, telephone INT NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), INDEX IDX_8D93D649D60322AC (role_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cas ADD CONSTRAINT FK_3AD60B6AB213CC FOREIGN KEY (lieu_id) REFERENCES lieu (id)');
        $this->addSql('ALTER TABLE sensibilisation ADD CONSTRAINT FK_3ABCFD903DA5256D FOREIGN KEY (image_id) REFERENCES media_object (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649D60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cas DROP FOREIGN KEY FK_3AD60B6AB213CC');
        $this->addSql('ALTER TABLE sensibilisation DROP FOREIGN KEY FK_3ABCFD903DA5256D');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649D60322AC');
        $this->addSql('DROP TABLE cas');
        $this->addSql('DROP TABLE faq');
        $this->addSql('DROP TABLE lieu');
        $this->addSql('DROP TABLE media_object');
        $this->addSql('DROP TABLE recommandation');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE sensibilisation');
        $this->addSql('DROP TABLE user');
    }
}
