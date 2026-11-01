<?php

namespace App\Http\Requests\Tasks;

use App\Exceptions\JsonValidationException;
use App\Models\Task;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class TaskCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'description' => 'sometimes|nullable|string',
            /*'status' => ['sometimes', 'nullable', 'string', Rule::in([
                Task::BACKLOG_STATUS,
                Task::PENDING_STATUS,
                Task::IN_PROCESS_STATUS,
                Task::COMPLETED_STATUS,
                Task::CLOSED_STATUS,
                Task::CANCELED_STATUS
            ])],*/
            'priority' => ['sometimes', 'nullable', 'string', Rule::in([
                Task::LOW_PRIORITY,
                Task::MEDIUM_PRIORITY,
                Task::HIGH_PRIORITY
            ])],
            'expected_at' => 'sometimes|nullable|date_format:Y-m-d H:i:s',
            'due_at' => 'sometimes|nullable|date_format:Y-m-d H:i:s',
            'responsible_users' => 'sometimes|nullable|array',
            'responsible_users.*.id' => 'required|integer|exists:users,id'
        ];
    }

    public function failedValidation(Validator $validator): JsonValidationException
    {
        $exception = new JsonValidationException($validator);
        Log::debug($exception);
        throw $exception;
    }
}