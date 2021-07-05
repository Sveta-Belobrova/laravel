<?php /** @noinspection ALL */

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
class Product extends Model
{


    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */

    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param int $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return \Illuminate\Support\Carbon|null
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param \Illuminate\Support\Carbon|null $created_at
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }
    public function getCategory():ProductCategory {
        return $this->productCategory;
    }
    /**
     * @param Builder $query
     * @param array $frd
     * @return Builder
     */
    //как вы видите она принимает
    //query - поскольку эта функция волшебная, query она создает сама, при вызове не указываем
    // по сути query это запрос к вашей модели, ко всем записям из таблицы и уже к этому запросу мы пишем
    // подзапросики
    //frd - переменные с формы, это уже надо передавать при вызове функции
    public function scopeFilter(Builder $query, array $frd): Builder
    {
        //тут мы выполняем код для всех переменных в frd, стандартный foreach, кто не знает почитать
        foreach ($frd as $key => $value) {
            //если значение в frd равно null, игнорируем код дальше и переходим к новому значению frd
            if (null === $value) {
                continue;//continue игнорирует код ниже
            }
            switch ($key) {
                case 'search':
                    //если ключь в frd равен search, кто не знает switch case конструкцию в гугл быстро )
                    {
                        //вызываем запрос внутри запроса, по сути можно и просто то, что после return написать
                        //и будет работать, но так как тут правильнее
                        $query->where(static function (Builder $query) use ($value): Builder {
                            //у вас есть операторы =, >, <, а есть like, для поиска записи по совпадениям
                            //ну вы и пишете что поле name должно содержать в себе строку со значением value
                            //знак % - показывает, что искомая строка может быть в любой части поля
                            //например название продукта "самокат синий" - если value %мокат% например, то
                            //он найдет совпадение
                            return $query->where('name', 'like', '%' . $value . '%');
                        });
                    }
                    break;
            }
        }

        return $query;
    }
}
