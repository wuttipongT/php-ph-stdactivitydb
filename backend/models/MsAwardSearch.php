<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\MsAward;

/**
 * MsAwardSearch represents the model behind the search form about `backend\models\MsAward`.
 */
class MsAwardSearch extends MsAward
{
    /**
     * @inheritdoc
     */
     public $StatusName;
    public function rules()
    {
        return [
            [['Award_Id'], 'integer'],
            [['Award_Name', 'Status','StatusName'], 'safe'],
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
        $query = MsAward::find();

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
            'Award_Id' => $this->Award_Id,
        ]);

        $query->andFilterWhere(['like', 'Award_Name', $this->Award_Name])
            ->andFilterWhere(['like', 'Status', $this->StatusName]);

        return $dataProvider;
    }
}
