<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Donation;

/**
 * DonationSearch represents the model behind the search form of `app\models\Donation`.
 */
class DonationSearch extends Donation
{
    public $donor_name; //atribut baru
    public $branch_name; //atribut baru
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'amount', 'donor_id', 'branch_id'], 'integer'],
            [['donation_date','donor_name','branch_name'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Donation::find();
        $query->leftJoin('donor', 'donation.donor_id = donor.id')
        ->leftJoin('branch', 'donation.branch_id = branch.id'); //gabungkan query dengan tabel donor dan branch;

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
            'amount' => $this->amount,
            'donation_date' => $this->donation_date,
            'donor_id' => $this->donor_id,
            'branch_id' => $this->branch_id,
        ]);

        $query->andFilterWhere(['like','donor.name',$this->donor_name])
        ->andFilterWhere(['like','branch.name',$this->branch_name]);//field search untuk donor dan branch
        
        return $dataProvider;
    }
}
