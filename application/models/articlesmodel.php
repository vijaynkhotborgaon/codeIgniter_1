<?php
class Articlesmodel extends CI_Model
{
	public function articles_list($limit, $offset)
	{
		$user_id=$this->session->userdata('user_id');
		$articles=$this->db
							->select(['title','id','image_path'])
							->from('articles')
							->where('user_id',$user_id)
							->limit($limit,$offset)
							->get();

		return $articles->result();

	}

	public function count_all_articles()
	{
		
		$articles=$this->db
							->select(['title','id'])
							->from('articles')
							
							->get();

		return $articles->num_rows();

	}

	public function num_rows()
	{
		$user_id=$this->session->userdata('user_id');
		$articles=$this->db
							->select(['title','id'])
							->from('articles')
							->where('user_id',$user_id)
							->get();

		return $articles->num_rows();

	}

	public function articles_list_public($limit, $offset)
	{
		$articles=$this->db
							
							->from('articles')
							->limit($limit,$offset)
							->get();

		return $articles->result();

	}

	public function add_article($array)
	{
		return $this->db->insert('articles',$array);
	}

	public function find_article($article_id)
	{
		$q=$this->db->where('id',$article_id)
					->get('articles');

		return $q->row();

	}

	public function update_article($article_id, Array $article)
	{
		return $this->db
				->where('id',$article_id)
				->update('articles', $article);

	}

	public function delete_article($article_id)
	{
		return $this->db
				->where('id',$article_id)
				->delete('articles');

	}





	

}