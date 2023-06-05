type Chat = {
  id: number
  message: string
  sent_at: string /* Date */
  is_attached: boolean
  user_id: number
  task_id: number | null
  phase_id: number | null
  created_at: string /* Date */ | null
  updated_at: string /* Date */ | null
}
