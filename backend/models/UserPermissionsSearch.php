<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UserPermissions;

/**
 * UserPermissionsSearch represents the model behind the search form about `app\models\UserPermissions`.
 */
class UserPermissionsSearch extends UserPermissions
{
    public function attributes()
    {
        // 添加关联字段到可搜索特性
        return array_merge(parent::attributes(), ['userRole.role_name','permissions.permission_name']);
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'role_id', 'permission_id'], 'integer'],
//             [['create_at', 'update_at'], 'safe'],
            [['userRole.role_name','permissions.permission_name'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = UserPermissions::find()
                ->leftJoin(UserRole::tableName(),UserRole::tableName().'.id = '.UserPermissions::tableName().'.role_id')
                ->leftJoin(Permissions::tableName(),Permissions::tableName().'.id = '.UserPermissions::tableName().'.permission_id')
        ;

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'role_id' => $this->role_id,
            'permission_id' => $this->permission_id,
            'create_at' => $this->create_at,
            'update_at' => $this->update_at,
        ]);
        if(isset($params['UserPermissionsSearch']['userRole.role_name'])){
            $query->andFilterWhere(['like', 'user_role.role_name', $params['UserPermissionsSearch']['userRole.role_name']]);
        }
        if(isset($params['UserPermissionsSearch']['permissions.permission_name'])){
            $query->andFilterWhere(['like', 'permissions.permission_name', $params['UserPermissionsSearch']['permissions.permission_name']]);
        }
        return $dataProvider;
    }
}
