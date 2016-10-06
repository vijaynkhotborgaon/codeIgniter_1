<?php
class User extends MY_Controller
{
	public function index()
	{

		
		$this->load->library('pagination');
		$this->load->helper('url');
		$this->load->model('articlesmodel','articles');

		$config=[
					'base_url'=>base_url('user/index'),
					'per_page'=>5,
					'total_rows'=>$this->articles->count_all_articles(),
					'full_tag_open'=>"<ul class='pagination'>",
					'full_tag_close'=>"</ul>",
					'next_tag_open'=>"<li>",
					'next_tag_close'=>"</li>",
					'prev_tag_open'=>"<li>",
					'prev_tag_close'=>"</li>",
					'num_tag_open'=>"<li>",
					'num_tag_close'=>"</li>",
					'cur_tag_open'=>"<li class='active'><a>",
					'cur_tag_close'=>"</a></li>",

				];

		$this->pagination->initialize($config);

		$articles=$this->articles->articles_list_public($config['per_page'],$this->uri->segment(3));

		$this->load->view('public/articles_list',['articles'=>$articles]);


	}
}