<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220907191746 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE alert');
        $this->addSql('ALTER TABLE address CHANGE user_id user_id INT DEFAULT NULL, CHANGE company company VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE avis CHANGE id id INT AUTO_INCREMENT NOT NULL, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF04584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('CREATE INDEX IDX_8F91ABF04584665A ON avis (product_id)');
        $this->addSql('ALTER TABLE `order` CHANGE user_id user_id INT DEFAULT NULL, CHANGE stripe_session stripe_session VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE order_details CHANGE binded_order_id binded_order_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product ADD show_top_vente INT NOT NULL, DROP isinhome, CHANGE category_id category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE alert (id INT NOT NULL, product_id INT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE address CHANGE user_id user_id INT NOT NULL, CHANGE company company VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE avis MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF04584665A');
        $this->addSql('DROP INDEX IDX_8F91ABF04584665A ON avis');
        $this->addSql('ALTER TABLE avis DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE avis CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE `order` CHANGE user_id user_id INT NOT NULL, CHANGE stripe_session stripe_session VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE order_details CHANGE binded_order_id binded_order_id INT NOT NULL');
        $this->addSql('ALTER TABLE product ADD isinhome TINYINT(1) NOT NULL, DROP show_top_vente, CHANGE category_id category_id INT NOT NULL');
        $this->addSql('ALTER TABLE `user` CHANGE roles roles LONGTEXT NOT NULL COLLATE `utf8mb4_bin`');
    }
}
