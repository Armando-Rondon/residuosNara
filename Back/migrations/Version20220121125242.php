<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220121125242 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE empresa (id INT AUTO_INCREMENT NOT NULL, nif VARCHAR(10) NOT NULL, nombre VARCHAR(100) NOT NULL, direccion VARCHAR(255) NOT NULL, sector VARCHAR(100) NOT NULL, contrase�a VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE residuos (id INT AUTO_INCREMENT NOT NULL, empresa_id INT DEFAULT NULL, ler VARCHAR(255) NOT NULL, comentario LONGTEXT NOT NULL, peligro INT NOT NULL, categoria_peligrosidad INT NOT NULL, tipo VARCHAR(255) NOT NULL, cantidad INT NOT NULL, precio DOUBLE PRECISION NOT NULL, unidad VARCHAR(255) NOT NULL, imagen VARCHAR(255) DEFAULT NULL, INDEX IDX_865ADD94521E1991 (empresa_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE residuos ADD CONSTRAINT FK_865ADD94521E1991 FOREIGN KEY (empresa_id) REFERENCES empresa (id)');
         $this->addSql("insert into residuos ( ler, comentario, peligro, categoria_peligrosidad, tipo, cantidad, precio, unidad, imagen) values ( 4, 'Monitor, white-throated', 2, 5, 'Macaw, green-winged', 4770, 252, 'Cookley', 'http://dummyimage.com/133x100.png/dddddd/000000');");
         $this->addSql("insert into residuos ( ler, comentario, peligro, categoria_peligrosidad, tipo, cantidad, precio, unidad, imagen) values ( 4, 'Wood pigeon', 2, 4, 'Bird (unidentified)', 1076, 239, 'Latlux', 'http://dummyimage.com/129x100.png/cc0000/ffffff');");
         $this->addSql("insert into residuos ( ler, comentario, peligro, categoria_peligrosidad, tipo, cantidad, precio, unidad, imagen) values ( 3, 'Paddy heron (unidentified)', 3, 5, 'Black-fronted bulbul', 3141, 202, 'Asoka', 'http://dummyimage.com/124x100.png/dddddd/000000');");
         $this->addSql("insert into residuos ( ler, comentario, peligro, categoria_peligrosidad, tipo, cantidad, precio, unidad, imagen) values ( 2, 'African buffalo', 3, 3, 'Asian water buffalo', 3593, 45, 'Fix San', 'http://dummyimage.com/114x100.png/5fa2dd/ffffff');");
         $this->addSql("insert into residuos ( ler, comentario, peligro, categoria_peligrosidad, tipo, cantidad, precio, unidad, imagen) values ( 2, 'Badger, american', 2, 2, 'African polecat', 2281, 20, 'Greenlam', 'http://dummyimage.com/193x100.png/5fa2dd/ffffff');");               
      $this->addSql("insert into residuos ( ler, comentario, peligro, categoria_peligrosidad, tipo, cantidad, precio, unidad, imagen) values ( 4, 'Wapiti, elk,', 2, 1, 'Lesser double-collared sunbird', 1016, 282, 'Subin', 'http://dummyimage.com/136x100.png/dddddd/000000');");
                 $this->addSql("insert into residuos ( ler, comentario, peligro, categoria_peligrosidad, tipo, cantidad, precio, unidad, imagen) values ( 3, 'Snowy sheathbill', 1, 4, 'Black-collared barbet', 2829, 274, 'Tres-Zap', 'http://dummyimage.com/116x100.png/5fa2dd/ffffff');");
                 $this->addSql("insert into residuos ( ler, comentario, peligro, categoria_peligrosidad, tipo, cantidad, precio, unidad, imagen) values ( 4, 'Goat, mountain', 1, 5, 'Mexican wolf', 2475, 233, 'Duobam', 'http://dummyimage.com/211x100.png/cc0000/ffffff');");
                 $this->addSql("insert into residuos ( ler, comentario, peligro, categoria_peligrosidad, tipo, cantidad, precio, unidad, imagen) values ( 1, 'Armadillo, common long-nosed', 2, 2, 'Boat-billed heron', 4865, 123, 'Otcom', 'http://dummyimage.com/162x100.png/cc0000/ffffff');");
               $this->addSql("insert into residuos ( ler, comentario, peligro, categoria_peligrosidad, tipo, cantidad, precio, unidad, imagen) values ( 3, 'Fox, silver-backed', 1, 2, 'Large-eared bushbaby', 893, 120, 'Y-find', 'http://dummyimage.com/215x100.png/dddddd/000000');");
                $this->addSql("insert into residuos ( ler, comentario, peligro, categoria_peligrosidad, tipo, cantidad, precio, unidad, imagen) values ( 4, 'Owl, burrowing', 2, 3, 'Stork, saddle-billed', 4178, 132, 'Zaam-Dox', 'http://dummyimage.com/239x100.png/ff4444/ffffff');");
                $this->addSql("insert into residuos ( ler, comentario, peligro, categoria_peligrosidad, tipo, cantidad, precio, unidad, imagen) values ( 1, 'Beaver, american', 5, 4, 'Common palm civet', 486, 94, 'Zamit', 'http://dummyimage.com/169x100.png/ff4444/ffffff');");
                 $this->addSql("insert into residuos ( ler, comentario, peligro, categoria_peligrosidad, tipo, cantidad, precio, unidad, imagen) values ( 2, 'American alligator', 2, 1, 'Jackal, golden', 4341, 80, 'Quo Lux', 'http://dummyimage.com/199x100.png/cc0000/ffffff');");
                 $this->addSql("insert into residuos ( ler, comentario, peligro, categoria_peligrosidad, tipo, cantidad, precio, unidad, imagen) values ( 4, 'Crested bunting', 2, 2, 'Brown capuchin', 1783, 226, 'Redhold', 'http://dummyimage.com/203x100.png/5fa2dd/ffffff');");
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE residuos DROP FOREIGN KEY FK_865ADD94521E1991');
        $this->addSql('DROP TABLE empresa');
        $this->addSql('DROP TABLE residuos');
    }
}
