<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\MsScholarship;

/**
 * MsScholarshipSearch represents the model behind the search form about `backend\models\MsScholarship`.
 */
class MsScholarshipSearch extends MsScholarship
{
    /**
     * @inheritdoc
     */
    public $StatusName;
    public function rules()
    {
        return [
            [['Scholarship_Id'], 'integer'],
            [['Scholarship_Name', 'Status','StatusName'], 'safe'],
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
        $query = MsScholarship::find();

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
            'Scholarship_Id' => $this->Scholarship_Id,
        ]);

        $query->andFilterWhere(['like', 'Scholarship_Name', $this->Scholarship_Name])
            ->andFilterWhere(['like', 'Status', $this->StatusName]);

        return $dataProvider;
    }
}
