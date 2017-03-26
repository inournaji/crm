<?php

namespace common\models;

use common\helpers\Constants;
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
            [['id', 'company_id', 'seller_id', 'vehicle_age_id', 'transmission_id', 'fuel_type_id', 'other_colors_available', 'pollutant_class_id', 'offer_for_business_customers', 'offer_for_private_customers', 'is_vehicle_in_stock', 'change_to_config_possible', 'pickup_ex_works_possible', 'leasing_type_id', 'available_amount', 'transfer_cost_of_car_house', 'provision_ex_factory', 'maintenance_and_wear', 'nationwide_delivery', 'admission_costs', 'same_prices_for_business_private', 'runtime_id1', 'down_payment1', 'kilometer_id1', 'lease_rate1', 'runtime_id2', 'down_payment2', 'kilometer_id2', 'lease_rate2', 'runtime_id3', 'down_payment3', 'kilometer_id3', 'lease_rate3', 'runtime_id4', 'down_payment4', 'kilometer_id4', 'lease_rate4', 'private_runtime_id1', 'private_deposit1', 'private_kilometer_id1', 'private_lease_rate1', 'private_runtime_id2', 'private_deposit2', 'private_kilometer_id2', 'private_lease_rate2', 'private_runtime_id3', 'private_advance_payment3', 'private_kilometer_id3', 'private_lease_rate3', 'private_runtime_id4', 'private_advance_payment4', 'private_kilometer_id4', 'private_lease_rate4', 'created_at', 'updated_at'], 'integer'],
            [['model', 'kw', 'ps', 'highlight1', 'highlight2', 'highlight3', 'highlight4',
                'motorization', 'equipment_line', 'description',
                'available_color1', 'available_color2', 'available_color3', 'color_interior',
                'picture1', 'picture2', 'picture3', 'picture4',
                'jw_year', 'features', 'special_text', 'private_special_text', 'business_special_text',
                'seller.email','vehicle_age.name','company.name', 'status','active'], 'safe'],
            [['consumption_in_town', 'consumption_outside', 'consumption', 'co2_emmission_komb', 'jw_kilometers', 'price_per_kilometer', 'short_term', 'list_price_net', 'insurance', 'interest_rate', 'effective_interest_rate', 'net_loan_amount', 'total_amount'], 'number'],
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

    public function attributes()
    {
        // add related fields to searchable attributes
        return array_merge(parent::attributes(), ['seller.email','vehicle_age.name','company.name']);
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
        $query = Car::find()->joinWith(['company' , 'seller', 'vehicleAge']);
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
        $dataProvider->sort->attributes = array_merge($dataProvider->sort->attributes, [
            'company.name' => [
                'asc' => ['company.name' => SORT_ASC],
                'desc' => ['company.name' => SORT_DESC]
            ],
            'seller.email' => [
                'asc' => ['seller.email' => SORT_ASC],
                'desc' => ['seller.email' => SORT_DESC]
            ],
            'vehicle_age.name' => [
                'asc' => ['vehicleAge.name' => SORT_ASC],
                'desc' => ['vehicleAge.name' => SORT_DESC]
            ],
        ]);
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'company_id' => $this->company_id,
            'seller_id' => $this->seller_id,
            'status' => $this->status,
            'active' => $this->active,
            'vehicle_age_id' => $this->vehicle_age_id,
            'transmission_id' => $this->transmission_id,
            'fuel_type_id' => $this->fuel_type_id,
            'other_colors_available' => $this->other_colors_available,
            'consumption_in_town' => $this->consumption_in_town,
            'consumption_outside' => $this->consumption_outside,
            'consumption' => $this->consumption,
            'co2_emmission_komb' => $this->co2_emmission_komb,
            'pollutant_class_id' => $this->pollutant_class_id,
            'jw_kilometers' => $this->jw_kilometers,
            'offer_for_business_customers' => $this->offer_for_business_customers,
            'offer_for_private_customers' => $this->offer_for_private_customers,
            'is_vehicle_in_stock' => $this->is_vehicle_in_stock,
            'change_to_config_possible' => $this->change_to_config_possible,
            'pickup_ex_works_possible' => $this->pickup_ex_works_possible,
            'leasing_type_id' => $this->leasing_type_id,
            'price_per_kilometer' => $this->price_per_kilometer,
            'short_term' => $this->short_term,
            'list_price_net' => $this->list_price_net,
            'available_amount' => $this->available_amount,
            'transfer_cost_of_car_house' => $this->transfer_cost_of_car_house,
            'provision_ex_factory' => $this->provision_ex_factory,
            'maintenance_and_wear' => $this->maintenance_and_wear,
            'insurance' => $this->insurance,
            'nationwide_delivery' => $this->nationwide_delivery,
            'admission_costs' => $this->admission_costs,
            'interest_rate' => $this->interest_rate,
            'effective_interest_rate' => $this->effective_interest_rate,
            'net_loan_amount' => $this->net_loan_amount,
            'total_amount' => $this->total_amount,
            'same_prices_for_business_private' => $this->same_prices_for_business_private,
            'runtime_id1' => $this->runtime_id1,
            'down_payment1' => $this->down_payment1,
            'kilometer_id1' => $this->kilometer_id1,
            'lease_rate1' => $this->lease_rate1,
            'runtime_id2' => $this->runtime_id2,
            'down_payment2' => $this->down_payment2,
            'kilometer_id2' => $this->kilometer_id2,
            'lease_rate2' => $this->lease_rate2,
            'runtime_id3' => $this->runtime_id3,
            'down_payment3' => $this->down_payment3,
            'kilometer_id3' => $this->kilometer_id3,
            'lease_rate3' => $this->lease_rate3,
            'runtime_id4' => $this->runtime_id4,
            'down_payment4' => $this->down_payment4,
            'kilometer_id4' => $this->kilometer_id4,
            'lease_rate4' => $this->lease_rate4,
            'private_runtime_id1' => $this->private_runtime_id1,
            'private_deposit1' => $this->private_deposit1,
            'private_kilometer_id1' => $this->private_kilometer_id1,
            'private_lease_rate1' => $this->private_lease_rate1,
            'private_runtime_id2' => $this->private_runtime_id2,
            'private_deposit2' => $this->private_deposit2,
            'private_kilometer_id2' => $this->private_kilometer_id2,
            'private_lease_rate2' => $this->private_lease_rate2,
            'private_runtime_id3' => $this->private_runtime_id3,
            'private_advance_payment3' => $this->private_advance_payment3,
            'private_kilometer_id3' => $this->private_kilometer_id3,
            'private_lease_rate3' => $this->private_lease_rate3,
            'private_runtime_id4' => $this->private_runtime_id4,
            'private_advance_payment4' => $this->private_advance_payment4,
            'private_kilometer_id4' => $this->private_kilometer_id4,
            'private_lease_rate4' => $this->private_lease_rate4,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'model', $this->model])
            ->andFilterWhere(['like', 'kw', $this->kw])
            ->andFilterWhere(['like', 'ps', $this->ps])
            ->andFilterWhere(['like', 'highlight1', $this->highlight1])
            ->andFilterWhere(['like', 'highlight2', $this->highlight2])
            ->andFilterWhere(['like', 'highlight3', $this->highlight3])
            ->andFilterWhere(['like', 'highlight4', $this->highlight4])
            ->andFilterWhere(['like', 'motorization', $this->motorization])
            ->andFilterWhere(['like', 'equipment_line', $this->equipment_line])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'available_color1', $this->available_color1])
            ->andFilterWhere(['like', 'available_color2', $this->available_color2])
            ->andFilterWhere(['like', 'available_color3', $this->available_color3])
            ->andFilterWhere(['like', 'color_interior', $this->color_interior])
            ->andFilterWhere(['like', 'picture1', $this->picture1])
            ->andFilterWhere(['like', 'picture2', $this->picture2])
            ->andFilterWhere(['like', 'picture3', $this->picture3])
            ->andFilterWhere(['like', 'picture4', $this->picture4])
            ->andFilterWhere(['like', 'jw_year', $this->jw_year])
            ->andFilterWhere(['like', 'features', $this->features])
            ->andFilterWhere(['like', 'special_text', $this->special_text])
            ->andFilterWhere(['like', 'private_special_text', $this->private_special_text])
            ->andFilterWhere(['like', 'business_special_text', $this->business_special_text]);

        $query->andFilterWhere(['like', 'company.name', $this->getAttribute('company.name')]);
        $query->andFilterWhere(['like', 'user.email', $this->getAttribute('seller.email')]);
        $query->andFilterWhere(['like', 'vehicle_age.name', $this->getAttribute('vehicle_age.name')]);

        if (!Yii::$app->user->isGuest && !Yii::$app->user->can(Constants::ADMIN))
        {
            $query->andFilterWhere(['seller_id' => Yii::$app->user->id ]);
        }

        return $dataProvider;
    }
}
