<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\ViewAward;

/**
 * TblStudentSearch represents the model behind the search form about `backend\models\TblStudent`.
 */
class ViewAwardSearch extends ViewAward
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Student_Index', 'Award_Id'], 'integer'],
            [['Award_Name', 'Award_Year'], 'safe']
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
        $query = ViewAward::find();

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
            'Student_Index' => $this->Student_Index,
            
        ]);

        $query->andFilterWhere(['like', 'Award_Name', $this->Award_Name])
            ->andFilterWhere(['like', 'Award_Year', $this->Award_Year]);

        return $dataProvider;
    }
}