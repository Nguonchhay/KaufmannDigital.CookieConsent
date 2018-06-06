<?php
namespace Neos\Flow\Persistence\Doctrine\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs! This block will be used as the migration description if getDescription() is not used.
 */
class Version20180530214527 extends AbstractMigration
{

    /**
     * @return string
     */
    public function getDescription()
    {
        return '';
    }

    /**
     * @param Schema $schema
     * @return void
     */
    public function up(Schema $schema)
    {
        // this up() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on "mysql".');
        
        $this->addSql('CREATE TABLE kaufmanndigital_cookieconsent_domain_model_log (persistence_object_identifier VARCHAR(40) NOT NULL, date DATETIME NOT NULL, cookieexpiry DATETIME NOT NULL, ipaddress VARCHAR(255) NOT NULL, choice VARCHAR(255) NOT NULL, PRIMARY KEY(persistence_object_identifier)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE neos_contentrepository_domain_model_nodedata DROP INDEX IDX_CE6515692D45FE4D, ADD UNIQUE INDEX UNIQ_CE6515692D45FE4D (movedto)');
        $this->addSql('DROP INDEX UNIQ_B7CE141455FF41717F7CBA1A ON neos_media_domain_model_thumbnail');
        $this->addSql('ALTER TABLE venstre_venstredk_domain_model_event CHANGE description description TEXT NOT NULL');
        $this->addSql('ALTER TABLE venstre_venstredk_domain_model_social_post CHANGE message message LONGBLOB NOT NULL');
    }

    /**
     * @param Schema $schema
     * @return void
     */
    public function down(Schema $schema)
    {
        // this down() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on "mysql".');
        
        $this->addSql('DROP TABLE kaufmanndigital_cookieconsent_domain_model_log');
        $this->addSql('ALTER TABLE neos_contentrepository_domain_model_nodedata DROP INDEX UNIQ_CE6515692D45FE4D, ADD INDEX IDX_CE6515692D45FE4D (movedto)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B7CE141455FF41717F7CBA1A ON neos_media_domain_model_thumbnail (originalasset, configurationhash)');
        $this->addSql('ALTER TABLE venstre_venstredk_domain_model_event CHANGE description description TEXT DEFAULT NULL COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE venstre_venstredk_domain_model_social_post CHANGE message message LONGBLOB NOT NULL');
    }
}