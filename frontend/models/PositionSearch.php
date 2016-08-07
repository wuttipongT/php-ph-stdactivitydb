<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Position;

/**
 * PositionSearch represents the model behind the search form about `app\models\Position`.
 */
class PositionSearch extends Position
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Position_Id', 'Student_Index', 'Club_Id'], 'integer'],
            [['Description', 'Position_Year', 'str1', 'str2', 'str3', 'str4', 'str5'], 'safe'],
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
        $query = Position::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

     //   $this->load($params);
/*
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
*/
        $query->andFilterWhere([
            //'Position_Id' => $this->Position_Id,
            'Student_Index' => $Student_Index,
           // 'Club_Id' => $this->Club_Id,
        ]);

        /*$query->andFilterWhere(['like', 'Description', $this->Description])
            ->andFilterWhere(['like', 'Position_Year', $this->Position_Year])
            ->andFilterWhere(['like', 'str1', $this->str1])
            ->andFilterWhere(['like', 'str2', $this->str2])
            ->andFilterWhere(['like', 'str3', $this->str3])
            ->andFilterWhere(['like', 'str4', $this->str4])
            ->andFilterWhere(['like', 'str5', $this->str5]);
*/
        return $dataProvider;
    }
}
