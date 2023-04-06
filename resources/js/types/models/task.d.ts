type Task = {
  id?: number
  title: string
  description?: string
  status: number
  priority: number
  estimated_time?: number
  bonus?: number
  penalty?: number
  start_date: string | Date
  due_date: string /* Date */
  completion_date: string /* Date */
  custom_fields: Array<CustomField>
  created_by?: number
  updated_by?: number
  depends_on?: number
  subtask_of?: number | null
  subtasks?: Task[]
  phase_id?: number
  created_at?: string /* Date */ | null
  updated_at?: string /* Date */ | null
}
