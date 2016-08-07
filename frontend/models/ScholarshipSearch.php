<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Scholarship;

/**
 * ScholarshipSearch represents the model behind the search form about `app\models\Scholarship`.
 */
class ScholarshipSearch extends Scholarship
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Scholarship_Id', 'Student_Index', 'Scholarship_DESC'], 'integer'],
            [['Scholarship_Year'], 'safe'],
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
        $query = Scholarship::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

       // $this->load($params);

     /*   if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->leftJoin('ms_scholarship', 'ms_scholarship.Scholarship_Id=tb_scholarship.Scholarship_DESC')
                    ->where('tb_scholarship.Student_Index=:id', [':id'=>$Student_Index]);
 */       
        
        $query->andFilterWhere([
           // 'Scholarship_Id' => $this->Scholarship_Id,
            'Student_Index' => $Student_Index
           // 'Scholarship_DESC' => $this->Scholarship_DESC,
        ]);

        //$query->andFilterWhere(['like', 'Scholarship_Year', $this->Scholarship_Year]);

        return $dataProvider;
    }
    
    
}
