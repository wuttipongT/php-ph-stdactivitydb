<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\ViewsScholarship;

/**
 * TblStudentSearch represents the model behind the search form about `backend\models\TblStudent`.
 */
class ViewScholarshipSearch extends ViewsScholarship
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Scholarship_DESC', 'Student_Index', 'Scholarship_Id'], 'integer'],
            [['Scholarship_Name', 'Scholarship_Year'], 'safe']
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
        $query = ViewsScholarship::find();

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

        $query->andFilterWhere(['like', 'Scholarship_Name', $this->Scholarship_Name])
            ->andFilterWhere(['like', 'Scholarship_Year', $this->Scholarship_Year])
            ->andFilterWhere(['like', 'Scholarship_DESC', $this->Scholarship_DESC]);

        return $dataProvider;
    }
    
}