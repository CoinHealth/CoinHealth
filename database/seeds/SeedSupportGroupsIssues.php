<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
class SeedSupportGroupsIssues extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$data = "Addiction,Addiction,Anger Management,Depression,Anxiety,Grief,Women's Issues,ADHD,Family Conflict,Asperger's Syndrome,Autism,Child or Adolescent,Trauma and PTSD,Behavioral Issues,Coping Skills,Self Esteem,Chronic Pain,Relationship Issues,Stress,Peer Relationships,Borderline Personality,Emotional Disturbance,Divorce,Parenting,Dual Diagnosis,Medication Management,Sexual Abuse,Life Coaching,Codependency,Transgender,Obsessive-Compulsive (OCD),Spirituality,Sleep or Insomnia,Eating Disorders,Infidelity,Sexual Addiction,Men's Issues";
        $issues = explode(",", $data);
        foreach($issues as $index => $issue) {
        	$index++;

            $pad = str_pad($index, 5, '0', STR_PAD_LEFT);

        	Category::create([
        		'category_code' => '00019'.$pad,
				'category_desc' => 'Support Group Issues',
				'title' => $issue,
				'value' => '',
        	]);
        }
    }
}
