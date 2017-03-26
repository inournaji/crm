<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Deal;

/**
 * DealSearch represents the model behind the search form about `common\models\Deal`.
 */
class DealSearch extends Deal
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'brand', 'km', 'operation_date', 'validity', 'type', 'attachment', 'created_at', 'updated_at'], 'integer'],
            [['model', 'description', 'link', 'features'], 'safe'],
            [['deposit', 'price'], 'number'],
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
        $user = Yii::$app->user->identity;
        $userRole = Yii::$app->authManager->getRolesByUser($user->id);
        $query = Deal::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'brand' => $this->brand,
            'km' => $this->km,
            'operation_date' => $this->operation_date,
            'deposit' => $this->deposit,
            'price' => $this->price,
            'validity' => $this->validity,
            'type' => $this->type,
            'attachment' => $this->attachment,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);
        if (!isset($userRole['admin']))
        {
            $query->andFilterWhere(['user_id' => $user->id ]);
        }

        $query->andFilterWhere(['like', 'model', $this->model])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'link', $this->link])
            ->andFilterWhere(['like', 'features', $this->features]);

        return $dataProvider;
    }
}
