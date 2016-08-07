<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Transcript;

/**
 * TranscriptSearch represents the model behind the search form about `app\models\Transcript`.
 */
class TranscriptSearch extends Transcript
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Transcript_Index', 'Student_Index'], 'integer'],
            [['Grade', 'GPA', 'Academic_Year'], 'safe'],
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
        $query = Transcript::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

       // $this->load($params);
/*
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }*/

        $query->andFilterWhere([
            //'Transcript_Index' => $this->Transcript_Index,
            'Student_Index' => $Student_Index,
        ]);

        //$query->andFilterWhere(['like', 'Grade', $this->Grade])
        //    ->andFilterWhere(['like', 'GPA', $this->GPA])
         //   ->andFilterWhere(['like', 'Academic_Year', $this->Academic_Year]);

        return $dataProvider;
    }
}
