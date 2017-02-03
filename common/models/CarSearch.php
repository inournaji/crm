<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Car;

/**
 * CarSearch represents the model behind the search form about `common\models\Car`.
 */
class CarSearch extends Car
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'brand', 'owner', 'attachment', 'type', 'created_at', 'updated_at'], 'integer'],
            [['model', 'houseno', 'postal', 'city', 'company', 'tel', 'mobile', 'fax', 'free_text', 'bank', 'iban', 'bic', 'account_owner', 'facebook'], 'safe'],
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
        $query = Car::find();

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
            'owner' => $this->owner,
            'attachment' => $this->attachment,
            'type' => $this->type,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'model', $this->model])
            ->andFilterWhere(['like', 'houseno', $this->houseno])
            ->andFilterWhere(['like', 'postal', $this->postal])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'company', $this->company])
            ->andFilterWhere(['like', 'tel', $this->tel])
            ->andFilterWhere(['like', 'mobile', $this->mobile])
            ->andFilterWhere(['like', 'fax', $this->fax])
            ->andFilterWhere(['like', 'free_text', $this->free_text])
            ->andFilterWhere(['like', 'bank', $this->bank])
            ->andFilterWhere(['like', 'iban', $this->iban])
            ->andFilterWhere(['like', 'bic', $this->bic])
            ->andFilterWhere(['like', 'account_owner', $this->account_owner])
            ->andFilterWhere(['like', 'facebook', $this->facebook]);

        return $dataProvider;
    }
}
