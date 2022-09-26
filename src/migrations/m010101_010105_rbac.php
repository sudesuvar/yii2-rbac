<?php
use yii\db\Migration;

class m010101_010105_rbac extends Migration
{
    public function up()
    {
        $auth = Yii::$app->authManager;

        $settings = yii\helpers\ArrayHelper::map(portalium\site\models\Setting::find()->asArray()->all(), 'name', 'value');
        $role = 'admin';
        $admin = (isset($role) && $role != '') ? $auth->getRole($role) : $auth->getRole('admin');

        $rbacWebAssignmentView = $auth->createPermission('rbacWebAssignmentView');
        $rbacWebAssignmentView->description = 'View rbac assignment';
        $auth->add($rbacWebAssignmentView);
        $auth->addChild($admin, $rbacWebAssignmentView);

        $rbacWebAssignmentAssign = $auth->createPermission('rbacWebAssignmentAssign');
        $rbacWebAssignmentAssign->description = 'Assign rbac assignment';
        $auth->add($rbacWebAssignmentAssign);
        $auth->addChild($admin, $rbacWebAssignmentAssign);

        $rbacWebAssignmentRevoke = $auth->createPermission('rbacWebAssignmentRevoke');
        $rbacWebAssignmentRevoke->description = 'Revoke rbac assignment';
        $auth->add($rbacWebAssignmentRevoke);
        $auth->addChild($admin, $rbacWebAssignmentRevoke);

        $rbacWebBulkAssignmentIndex = $auth->createPermission('rbacWebBulkAssignmentIndex');
        $rbacWebBulkAssignmentIndex->description = 'View bulk assignment';
        $auth->add($rbacWebBulkAssignmentIndex);
        $auth->addChild($admin, $rbacWebBulkAssignmentIndex);

        $rbacWebBulkAssignmentAssign = $auth->createPermission('rbacWebBulkAssignmentAssign');
        $rbacWebBulkAssignmentAssign->description = 'Assign bulk assignment';
        $auth->add($rbacWebBulkAssignmentAssign);
        $auth->addChild($admin, $rbacWebBulkAssignmentAssign);

        $rbacWebBulkAssignmentRevoke = $auth->createPermission('rbacWebBulkAssignmentRevoke');
        $rbacWebBulkAssignmentRevoke->description = 'Revoke bulk assignment';
        $auth->add($rbacWebBulkAssignmentRevoke);
        $auth->addChild($admin, $rbacWebBulkAssignmentRevoke);

        $rbacWebPermissionViewPath = $auth->createPermission('rbacWebPermissionViewPath');
        $rbacWebPermissionViewPath->description = 'View permission path';
        $auth->add($rbacWebPermissionViewPath);
        $auth->addChild($admin, $rbacWebPermissionViewPath);

        $rbacWebRoleViewPath = $auth->createPermission('rbacWebRoleViewPath');
        $rbacWebRoleViewPath->description = 'View role path';
        $auth->add($rbacWebRoleViewPath);
        $auth->addChild($admin, $rbacWebRoleViewPath);

    }

    public function down()
    {
        $auth = Yii::$app->authManager;

        $auth->remove($auth->getPermission('rbacWebAssignmentView'));
        $auth->remove($auth->getPermission('rbacWebAssignmentAssign'));
        $auth->remove($auth->getPermission('rbacWebAssignmentRevoke'));
        $auth->remove($auth->getPermission('rbacWebBulkAssignmentIndex'));
        $auth->remove($auth->getPermission('rbacWebBulkAssignmentAssign'));
        $auth->remove($auth->getPermission('rbacWebBulkAssignmentRevoke'));
        $auth->remove($auth->getPermission('rbacWebPermissionViewPath'));
        $auth->remove($auth->getPermission('rbacWebRoleViewPath'));

    }
}
