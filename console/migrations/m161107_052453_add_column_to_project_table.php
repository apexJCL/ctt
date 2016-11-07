<?php

use yii\db\Migration;

class m161107_052453_add_column_to_project_table extends Migration
{
    public function up()
    {
        $this->addColumn('project', 'status_id', 'integer');
        $this->execute(/** @lang MySQL */
            "UPDATE project SET status_id = 1"
        );
        $this->execute(/** @lang MySQL */
            "ALTER TABLE project MODIFY COLUMN status_id INTEGER NOT NULL DEFAULT 1"
        );
        $this->addForeignKey('project_status_fk', 'project', 'status_id', 'project_status', 'id');
    }

    public function down()
    {
        $this->dropForeignKey('project_status_fk', 'project');
        $this->dropColumn('project', 'status_id');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
