<?php
/**
 * This is the template for generating CRUD search class of the specified model.
 */

use yii\helpers\StringHelper;


/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$modelClass = StringHelper::basename($generator->modelClass);
$searchModelClass = StringHelper::basename($generator->searchModelClass);
if ($modelClass === $searchModelClass) {
    $modelAlias = $modelClass . 'Model';
}
$rules = $generator->generateSearchRules();
$labels = $generator->generateSearchLabels();
$searchAttributes = $generator->getSearchAttributes();
$searchConditions = $generator->generateSearchConditions();

echo "<?php\n";
?>

namespace <?= StringHelper::dirname(ltrim($generator->searchModelClass, '\\')) ?>;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use kordar\yak\traits\SearchTrait;
use <?= ltrim($generator->modelClass, '\\') . (isset($modelAlias) ? " as $modelAlias" : "") ?>;

/**
 * <?= $searchModelClass ?> represents the model behind the search form of `<?= $generator->modelClass ?>`.
 */
class <?= $searchModelClass ?> extends <?= isset($modelAlias) ? $modelAlias : $modelClass ?>

{
    use SearchTrait;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            <?= implode(",\n            ", $rules) ?>,
            [['yak_lst', 'yak_lst_txt', 'yak_lst_ext', 'yak_dt', 'yak_dt_s', 'yak_dt_e'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = <?= isset($modelAlias) ? $modelAlias : $modelClass ?>::find();

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
        <?= implode("\n        ", $searchConditions) ?>

        return $dataProvider;
    }
}
