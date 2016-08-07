<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\MsAdvisors;

/**
 * MsAdvisorsSearch represents the model behind the search form about `backend\models\MsAdvisors`.
 */
class MsAdvisorsSearch extends MsAdvisors
{
    /**
     * @inheritdoc
     */
    public $StatusName;
    public function rules()
    {
        return [
            [['Advisors_Id'], 'integer'],
            [['Advisors_Name', 'Status','StatusName'], 'safe'],
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
        $query = MsAdvisors::find();

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
            'Advisors_Id' => $this->Advisors_Id,
        ]);

        $query->andFilterWhere(['like', 'Advisors_Name', $this->Advisors_Name])
            ->andFilterWhere(['like', 'Status', $this->StatusName]);

        return $dataProvider;
    }
}
