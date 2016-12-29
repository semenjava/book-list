<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Базовая модель с основными методами для взаимодействия с данными
 *
 * Class Base_model
 */
class Base_model extends CI_Model {

    // Название таблицы
    protected $_table = '';

    /**
     * Получение объекта
     *
     * @param int $item_id - id объекта
     * @return bool
     */
    public function get_item($item_id = 0)
    {
        $query = $this->db->where('id', $item_id)->get($this->_table);
        if ($query->num_rows()) return $query->row(); else return false;
    }

    /**
     * Получение списка объектов
     *
     * @param array $conditions - набор условий для получения списка
     * @param string $order - порядок сортировки
     * @param int $page - текущая страница списка
     * @param int $per_page - количество записей на странице
     * @return mixed
     */
    public function get_list($conditions = array(), $order = '', $page = 1, $per_page = 0)
    {
        // Порядок сортировки
        if ($order)
        {
            $this->db->order_by($order);
        }

        // Лимиты для постраничной навигации
        if ($per_page)
        {
            $this->db->limit($per_page, ($page - 1) * $per_page);
        }

        return $this->db->get_where($this->_table, $conditions);
    }

    /**
     * Получение объекта по условиям
     *
     * @param array $conditions - набор условий для выбора объекта
     * @param string $order - порядок сортировки
     * @return bool
     */
    public function get_one($conditions = array(), $order = '')
    {
        if ($order)
        {
            $this->db->order_by($order);
        }

        $query = $this->db->limit(1)->get_where($this->_table, $conditions);
        if ($query->num_rows()) return $query->row(); else return false;
    }

    /**
     * Получение общего количества записей согласно условиям
     *
     * @param array $conditions - набор условий для выбора записей
     */
    public function get_total($conditions = array())
    {
        return $this->db->where($conditions)->count_all_results($this->_table);
    }

    /**
     * Сохранение информации об объекте в БД
     *
     * @param array $data - информация для сохранения
     */
    public function save($data = array())
    {
        if (isset($data['id']))
        {
            $item_id = $data['id'];
            unset($data['id']);

            $this->db->where('id', $item_id)->update($this->_table, $data);

            return $item_id;
        }
        else
        {
            $this->db->insert($this->_table, $data);

            return $this->db->insert_id();
        }
    }

    /**
     * Удаление объекта
     *
     * @param int $item_id - id объекта
     */
    public function delete($item_id = 0)
    {
        $this->db->where('id', $item_id)->delete($this->_table);
    }

    /**
     * Изменение последовательности объектов
     *
     * @param array $items - перечень объектов в порядке расположения
     * @param array $additional_data - дополнительные данные для обновления
     */
    public function change_priority($items = array(), $additional_data = array())
    {
        foreach ($items as $index => $item)
        {
            if ($item)
            {
                $additional_data['id'] = $item;
                $additional_data['priority'] = $index + 1;

                $this->save($additional_data);
            }
        }
    }

}