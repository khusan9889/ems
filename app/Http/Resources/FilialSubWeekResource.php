<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FilialSubWeekResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'g_appeal' => $this->g_appeal,
            'g_sleeping' => $this->g_sleeping,
            'g_ambulator' => $this->g_ambulator,
            'y_appeal' => $this->y_appeal,
            'y_sleeping' => $this->y_sleeping,
            'y_ambulator' => $this->y_ambulator,
            'r_appeal' => $this->r_appeal,
            'r_sleeping' => $this->r_sleeping,
            'r_death' => $this->r_death,
            'r_dead' => $this->r_dead,
            'ambulance_03' => $this->ambulance_03,
            'children_03' => $this->children_03,
            'arrived_himself' => $this->arrived_himself,
            'children_arrived_himself' => $this->children_arrived_himself,
            'came_ticket' => $this->came_ticket,
            'children_came_ticket' => $this->children_came_ticket,
            'recumbent' => $this->recumbent,
            'children_recumbent' => $this->children_recumbent,
            'operation' => $this->operation,
            'children_operation' => $this->children_operation,
            'high_tech_operas' => $this->high_tech_operas,
            'children_high_tech_operas' => $this->children_high_tech_operas,
            'death' => $this->death,
            'children_death' => $this->children_death,
            'ambulator' => $this->ambulator,
            'children_ambulator' => $this->children_ambulator,
            'ambulatory_operas' => $this->ambulatory_operas,
            'including_children' => $this->including_children,
            'branch_id' => $this->branch_id,
            'branch' => new  BranchResource($this->branch),
            'sub_filial_id' => $this->sub_filial_id,
            'sub_filial' => new SubFilialResource($this->sub_filial),
            'week_id' => $this->week_id,
            'week' =>new WeekResource($this->week)
        ];
    }
}
