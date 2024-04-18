<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "donation".
 *
 * @property int $id
 * @property int $amount
 * @property string $donation_date
 * @property int $donor_id
 * @property int $branch_id
 *
 * @property Branch $branch
 * @property Donor $donor
 */
class Donation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'donation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['amount', 'donation_date', 'donor_id', 'branch_id'], 'required'],
            [['amount', 'donor_id', 'branch_id'], 'integer'],
            [['donation_date'], 'safe'],
            [['branch_id'], 'exist', 'skipOnError' => true, 'targetClass' => Branch::class, 'targetAttribute' => ['branch_id' => 'id']],
            [['donor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Donor::class, 'targetAttribute' => ['donor_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'amount' => 'Amount',
            'donation_date' => 'Donation Date',
            'donor_id' => 'Donor ID',
            'branch_id' => 'Branch ID',
            'donor.name' => 'Donor',
            'branch.name' => 'Branch',
        ];
    }

    /**
     * Gets query for [[Branch]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBranch()
    {
        return $this->hasOne(Branch::class, ['id' => 'branch_id']);
    }

    /**
     * Gets query for [[Donor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDonor()
    {
        return $this->hasOne(Donor::class, ['id' => 'donor_id']);
    }
}
