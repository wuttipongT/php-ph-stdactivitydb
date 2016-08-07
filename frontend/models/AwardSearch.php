<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Award;

/**
 * AwardSearch represents the model behind the search form about `app\models\Award`.
 */
class AwardSearch extends Award
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Award_Index', 'Award_Id', 'Student_Index'], 'integer'],
            [['Award_Year'], 'safe'],
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
    public function search($Student_Index)
    {
        $query = Award::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

       // $this->load($params);
/*
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
*/
        $query->andFilterWhere([
            //'Award_Index' => $this->Award_Index,
           //'Award_Id' => $this->Award_Id,
            'Student_Index' => $Student_Index,
        ]);

        //$query->andFilterWhere(['like', 'Award_Year', $this->Award_Year]);

        return $dataProvider;
    }
}
