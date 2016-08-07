<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\ViewsStudent;
use yii\data\SqlDataProvider;
use yii\db\Query;
/**
 * TblStudentSearch represents the model behind the search form about `backend\models\TblStudent`.
 */
class ViewStudentSearch extends ViewsStudent
{
    /**
     * @inheritdoc
     */
    public $chkbMilitary;
    public $ddlMilitary;
     
    public $chkbROTCS;
    public $ddlROTCS;
    
    public $chkbGenius;
    public $ddlGenius;
    
    public $chkSport;
    public $ddlSport;
    //--------------------------
    
    public $chkbPositionItem;
    public $ddlPositionItem;

    public $chkScholarship;
    public $ddlScholarship;
    
    public $chkbAwardItem;
    public $ddlAwardItem;
    
    public $rdoClass = null;
    public $ddlClass;
    public $txtClass;
    
    public $txtSearch;
    public $ddlTxtSearch;
    public function rules()
    {
       
        return [
            [['Student_Index', 'Advisors_Id', 'Position_Id', 'Club_Id', 'Type_Id'], 'integer'],
            [['Student_Id', 'Student_Name', 'Student_LastName', 'Image_Path', 'Address1', 'Address2', 'Phone1', 
                'Phone2', 'Name_Father', 'Name_Mother', 'Name_Parent', 'Phone_Parent', 'Work_Address_Parent', 
                'Congenital_Disease', 'Be_Allergic', 'Food_Allergy', 'Buddy', 'Buddy_Phone', 'Hobby', 'Ambition', 
                'Sport', 'Genius', 'ROTCS', 'Clement_Military', 'str','Position_Name','Description','Club_Name',
                'Type_Name','Scholarship','Award','Advisors_Name','chkbMilitary','chkbROTCS','chkbGenius','chkSport','ddlSport',
                'ddlGenius','ddlROTCS','ddlMilitary','chkbPositionItem','ddlPositionItem','chkScholarship','ddlScholarship',
                'chkbAwardItem','ddlAwardItem','rdoClass','ddlClass','txtClass','txtSearch','ddlTxtSearch'], 'safe'],
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
        $query = ViewsStudent::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        
        if($this->rdoClass == 1){
            $query->andFilterWhere(['like', 'Student_Id', $this->ddlClass]);            
           // return $dataProvider;
        } 
        if($this->rdoClass == 2){
            $query->andFilterWhere(['like', 'Student_Id', $this->txtClass]);
            //return $dataProvider;
        }
        if($this->chkScholarship == 1){
                $query->leftJoin('views_scholarship', 'views_scholarship.Student_Index=views_student.Student_Index')
                        ->andWhere(['views_scholarship.Scholarship_DESC' => $this->ddlScholarship]);
                       // ->andWhere(['LIKE', 'content', $this->keyword])
                        //->orderBy('updated_at');
        }
        if($this->chkbAwardItem){
            $query->leftJoin('views_award', 'views_award.Student_Index=views_student.Student_Index')
                    ->where('views_award.Award_Id=:id', [':id'=>$this->ddlAwardItem]);
        }
        
        if ($this->chkbPositionItem == 1){
            if($this->ddlPositionItem > 101){//
                $query->andFilterWhere([
                    'Position_Id' => $this->ddlPositionItem,
                ]);
            }else{
                $query->andFilterWhere([
                    'Club_Id' => $this->ddlPositionItem,
                ]);   
            }
            
        }
        
        if($this->chkSport == 1){
            $query->andFilterWhere(['like', 'Sport', $this->ddlSport]);
        }
        
        if($this->chkbGenius == 1){
            $query->andFilterWhere(['like', 'Sport', $this->ddlGenius]);
        }
        
        if($this->chkbROTCS == 1 ){
            $query->andFilterWhere(['ROTCS' => $this->ddlROTCS]);
        }
        
        if($this->chkbMilitary == 1){
            $query->andFilterWhere(['like', 'Clement_Military', $this->ddlMilitary]);
        }
       
        if($this->ddlTxtSearch == 0){
            $query->andFilterWhere([
                    'Student_Id' => $this->txtSearch,
                ]);
        }else if($this->ddlTxtSearch == 1){
            $query->andFilterWhere(['like', 'Student_Name', $this->txtSearch]);
        }else if($this->ddlTxtSearch == 2){
            $query->andFilterWhere(['like', 'Student_LastName', $this->txtSearch]);
        }
       
        return $dataProvider;
    }
}
