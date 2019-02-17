<?php

namespace kordar\yak\models\admin;

use kordar\yak\traits\SearchTrait;
use yii\data\ActiveDataProvider;

/**
 * AdminSearch represents the model behind the search form about `kordar\yak\models\admin\User`.
 */
class UserSearch extends User
{
    use SearchTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'type'], 'integer'],
            [['yak_lst', 'yak_lst_txt', 'yak_lst_ext', 'yak_dt', 'yak_dt_s', 'yak_dt_e'], 'safe'],
        ];
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
        $query = User::find()->select('*')->addSelect(User::extFieldsByCase());

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        if (!empty($this->yak_dt_s) && !empty($this->yak_dt_e)) {
            $query->andFilterWhere(['between', $this->yak_dt, strtotime($this->yak_dt_s), strtotime($this->yak_dt_e) + 86400]);
        }

        if (!empty($this->yak_lst)) {

            if ($this->yak_lst_ext == 'EQ') {
                $query->andFilterWhere([$this->yak_lst => $this->yak_lst_txt]);
            }

            if ($this->yak_lst_ext == 'LIKE') {
                $query->andFilterWhere(['like', $this->yak_lst, $this->yak_lst_txt]);
            }

        }

        // grid filtering conditions
        $query->andFilterWhere(['status' => $this->status, 'type' => $this->type]);

        return $dataProvider;
    }
}
