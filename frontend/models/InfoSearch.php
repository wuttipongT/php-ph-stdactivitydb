<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Info;

/**
 * InfoSearch represents the model behind the search form about `app\models\Info`.
 */
class InfoSearch extends Info
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Student_Index', 'Advisors_Id'], 'integer'],
            [['Student_Id', 'Student_Name', 'Student_LastName', 'Image_Path', 'Address1', 'Address2', 'Phone1', 'Phone2', 'Name_Father', 'Name_Mother', 'Name_Parent', 'Phone_Parent', 'Work_Address_Parent', 'Congenital_Disease','Be_Allergic','Food_Allergy','Buddy', 'Buddy_Phone', 'Hobby', 'Ambition', 'Favorite_Sport', 'Genius', 'ROTCS', 'Clement_Military', 'str'], 'safe'],
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
        $query = Info::find();

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
            'Advisors_Id' => $this->Advisors_Id,
            'Clement_Military' => $this->Clement_Military,
        ]);

        $query->andFilterWhere(['like', 'Student_Id', $this->Student_Id])
            ->andFilterWhere(['like', 'Student_Name', $this->Student_Name])
            ->andFilterWhere(['like', 'Student_LastName', $this->Student_LastName])
            ->andFilterWhere(['like', 'Image_Path', $this->Image_Path])
            ->andFilterWhere(['like', 'Address1', $this->Address1])
            ->andFilterWhere(['like', 'Address2', $this->Address2])
            ->andFilterWhere(['like', 'Phone1', $this->Phone1])
            ->andFilterWhere(['like', 'Phone2', $this->Phone2])
            ->andFilterWhere(['like', 'Name_Father', $this->Name_Father])
            ->andFilterWhere(['like', 'Name_Mother', $this->Name_Mother])
            ->andFilterWhere(['like', 'Name_Parent', $this->Name_Parent])
            ->andFilterWhere(['like', 'Phone_Parent', $this->Phone_Parent])
            ->andFilterWhere(['like', 'Work_Address_Parent', $this->Work_Address_Parent])
            ->andFilterWhere(['like', 'Buddy_Phone', $this->Buddy_Phone])
            ->andFilterWhere(['like', 'Hobby', $this->Hobby])
            ->andFilterWhere(['like', 'Ambition', $this->Ambition])
            ->andFilterWhere(['like', 'Favorite_Sport', $this->Favorite_Sport])
            ->andFilterWhere(['like', 'Genius', $this->Genius])
            ->andFilterWhere(['like', 'ROTCS', $this->ROTCS])
            ->andFilterWhere(['like', 'str', $this->str]);

        return $dataProvider;
    }
}
