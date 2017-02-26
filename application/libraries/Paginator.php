<?php defined('BASEPATH') or exit('No direct script access allowed');

class Paginator
{
    /**
     * The pagination config used on Eloquent relations.
     *
     * @param  string $baseUrl
     * @param  int    $totalRows
     * @param  int    $perPage
     * @param  int    $segment
     * @return array  $config
     */
    public function relation($baseUrl, $totalRows, $perPage, $segment)
    {
        $config['base_url']             = $baseUrl;
        $config['total_rows']           = $totalRows;
        $config['per_page']             = $perPage;
        $config['uri_segment']          = $segment;
        $config['num_links']            = round($config['total_rows'] / $config['per_page']);
        $config['page_query_string']    = true;
        //$config['use_page_numbers']   = TRUE;
        $config['query_string_segment'] = 'page';
        $config['full_tag_open']        = '<ul style="margin-top: -12px; margin-bottom: 3px;" class="pagination pagination-sm">';
        $config['full_tag_close']       = '</ul><!--pagination-->';
        $config['first_link']           = '&laquo; First';
        $config['first_tag_open']       = '<li class="prev page">';
        $config['first_tag_close']      = '</li>';
        $config['last_link']            = 'Last &raquo;';
        $config['last_tag_open']        = '<li class="next page">';
        $config['last_tag_close']       = '</li>';
        $config['next_link']            = 'Volgende &rarr;';
        $config['next_tag_open']        = '<li class="next page">';
        $config['next_tag_close']       = '</li>';
        $config['prev_link']            = '&larr; Vorige';
        $config['prev_tag_open']        = '<li class="prev page">';
        $config['prev_tag_close']       = '</li>';
        $config['cur_tag_open']         = '<li class="active"><a href="">';
        $config['cur_tag_close']        = '</a></li>';
        $config['num_tag_open']         = '<li class="page">';
        $config['num_tag_close']        = '</li>';
        // $config['display_pages']     = FALSE;
        //
        $config['anchor_class']         = 'follow_link';
        //> END PAGINATION CONFIG

        return $config;
    }
}
