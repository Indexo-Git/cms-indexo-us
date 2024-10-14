<?php
namespace App\Traits;

use App\Models\Setting;
use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;

trait OpenAITrait
{

    /**
     * Get AI generated post introduction
     * @param string $title
     * @return mixed
     */
    public function getIntroduction(string $title): mixed
    {
        $prompt = "Based on the tile  :'".$title."' Provide an introduction for a blog post";
        $result = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'system', 'content' => 'You are a virtual SEO specialist\n\nYou will provide your answer inside <p> HTML tags. \n\nAlso search for keywords or relevant phrases to include <b>  and/or <i> tags.\n'],
                ['role' => 'user', 'content' => $prompt]
            ],
            "temperature" => 1,
            "max_tokens" => 500,
            "top_p" => 1,
            "frequency_penalty" => 1,
            "presence_penalty" => 1
        ]);
        return $result['choices'][0]['message']['content'];
    }

    /**
     * Get AI generated post conclusion
     * @param string $title
     * @param string $url
     * @param string $keywords
     * @return mixed
     */
    public function getConclusion(string $title, string $url, string $keywords): mixed
    {
        $prompt = "Based on the title :'".$title."' Provide a conclusion for a blog post that will work as a CTA for including a link pointing to this: ".$url."  using this anchor: ".$keywords;
        $result = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'system', 'content' => 'You are a virtual SEO specialist\n\nYou will provide your answer inside <p> HTML tags. \n\nAlso search for keywords or relevant phrases to include <b>  and/or <i> tags.\n'],
                ['role' => 'user', 'content' => $prompt]
            ],
            "temperature" => 1,
            "max_tokens" => 500,
            "top_p" => 1,
            "frequency_penalty" => 1,
            "presence_penalty" => 1
        ]);
        return $result['choices'][0]['message']['content'];
    }

    /**
     * Get AI post Meta Title
     * @param string $title
     * @return mixed
     */
    public function getMetaTitle(string $title): mixed
    {
        $prompt = "Based on the tile :'".$title."' Provide a meta title within ".Setting::where('name','meta_title_min_length')->first()->value."-".Setting::where('name','meta_title_max_length')->first()->value." characters.";
        $result = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'system', 'content' => 'You are a virtual SEO specialist'],
                ['role' => 'user', 'content' => $prompt],
            ],
            "temperature" => 1,
            "max_tokens" => 500,
            "top_p" => 1,
            "frequency_penalty" => 1,
            "presence_penalty" => 1
        ]);
        return $result['choices'][0]['message']['content'];
    }

    /**
     * Get AI post Meta Description
     * @param string $title
     * @return mixed
     */
    public function getMetaDescription(string $title): mixed
    {
        $prompt = "Based on the next title: '".$title."' Provide a meta description within ".Setting::where('name','meta_description_min_length')->first()->value."-".Setting::where('name','meta_description_max_length')->first()->value." characters.";
        $result = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'system', 'content' => 'You are a virtual SEO specialist'],
                ['role' => 'user', 'content' => $prompt],
            ],
            "temperature" => 1,
            "max_tokens" => 500,
            "top_p" => 1,
            "frequency_penalty" => 1,
            "presence_penalty" => 1
        ]);
        return $result['choices'][0]['message']['content'];
    }

    /**
     * Get AI post keywords
     * @param string $title
     * @return mixed
     */
    public function getKeywords(string $title): mixed
    {
        $prompt = "Based on the next title: '".$title."' Provide a list of at least 50 keywords related to the article should be provided with grammatical variation, not in list format but separated by commas.";
        $result = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'system', 'content' => 'You are a virtual SEO specialist'],
                ['role' => 'user', 'content' => $prompt],
            ],
            "temperature" => 1,
            "max_tokens" => 500,
            "top_p" => 1,
            "frequency_penalty" => 1,
            "presence_penalty" => 1
        ]);
        return $result['choices'][0]['message']['content'];
    }

    public function qualifyMessage(array $data){
        $result = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'system', 'content' => 'You are an AI assistant for a '.Setting::where('name','enterprise_type')->first()->value.', based on the content of an email body you will qualify it.'],
                ['role' => 'system', ' content' => 'You will qualify this email as either as: 1 = Lead. 2 = Spam. 3 = Other, depending of the option you consider fits the most'],
                ['role' => 'user', 'content' => 'This is the email body: ' . $data['email']],
                ['role' => 'system', 'content' => 'Your answer will be only the digits 1, 2 or 3']
            ],
            "temperature" => 1,
            "max_tokens" => 500,
            "top_p" => 1,
            "frequency_penalty" => 1,
            "presence_penalty" => 1
        ]);
        return $result['choices'][0]['message']['content'];
    }
}
