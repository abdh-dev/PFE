type TaskHistory = {
  id: number
  field_name: string
  old_value: string
  new_value: string
  task_id: number
  created_at: string /* Date */ | null
  updated_at: string /* Date */ | null
}
